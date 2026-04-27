<?php

namespace App\Http\Controllers;

use App\Models\UserManual;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class UserManualController extends Controller
{
    public function index(Request $request)
    {
        if ($request->ajax()) {
            $query = UserManual::query();
            
            return \Yajra\DataTables\Facades\DataTables::of($query)
                ->addIndexColumn()
                ->addColumn('action', function($row){
                    $btn = '<div class="flex items-center justify-end space-x-2">';
                    $btn .= '<a href="'.route('user-manuals.view', $row->id).'" class="p-2 text-indigo-600 hover:bg-indigo-50 rounded-lg transition-all duration-200" title="View PDF" target="_blank">
                                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" /><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z" /></svg>
                             </a>';
                    $btn .= '<a href="'.route('user-manuals.download', $row->id).'" class="p-2 text-emerald-600 hover:bg-emerald-50 rounded-lg transition-all duration-200" title="Download PDF">
                                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16v1a3 3 0 003 3h10a3 3 0 003-3v-1m-4-4l-4 4m0 0l-4-4m4 4V4" /></svg>
                             </a>';
                    $btn .= '<form action="'.route('user-manuals.destroy', $row->id).'" method="POST" class="inline">
                                '.csrf_field().'
                                '.method_field('DELETE').'
                                <button type="submit" class="p-2 text-rose-600 hover:bg-rose-50 rounded-lg transition-all duration-200" onclick="return confirm(\'Are you sure?\')" title="Delete Manual">
                                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" /></svg>
                                </button>
                             </form>';
                    $btn .= '</div>';
                    return $btn;
                })
                ->rawColumns(['action'])
                ->make(true);
        }

        return view('user_manuals.index');
    }

    public function create()
    {
        return view('user_manuals.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'pdf_file' => 'required|mimes:pdf|max:10240', // 10MB max
        ]);

        if ($request->hasFile('pdf_file')) {
            $path = $request->file('pdf_file')->store('user_manuals', 'public');
            
            UserManual::create([
                'title' => $request->title,
                'file_path' => $path,
            ]);

            return redirect()->route('user-manuals.index')->with('success', 'User manual uploaded successfully.');
        }

        return back()->with('error', 'Failed to upload PDF.');
    }

    public function view(UserManual $userManual)
    {
        $path = storage_path('app/public/' . $userManual->file_path);
        if (!file_exists($path)) {
            abort(404);
        }
        return response()->file($path);
    }

    public function download(UserManual $userManual)
    {
        $path = storage_path('app/public/' . $userManual->file_path);
        if (!file_exists($path)) {
            abort(404);
        }
        return response()->download($path, $userManual->title . '.pdf');
    }

    public function destroy(UserManual $userManual)
    {
        Storage::disk('public')->delete($userManual->file_path);
        $userManual->delete();
        return redirect()->route('user-manuals.index')->with('success', 'User manual deleted successfully.');
    }
}
