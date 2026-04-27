<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Notice;

class NoticeController extends Controller
{
    public function index(Request $request)
    {
<<<<<<< HEAD
       
=======
>>>>>>> 89a3400d8febfa7c0af4cd0221386851a7d4c933
        if ($request->ajax()) {
            $query = Notice::query();
            
            return \Yajra\DataTables\Facades\DataTables::of($query)
                ->addIndexColumn()
                ->addColumn('title', function($row){
                    $status = $row->is_active 
                        ? '<span class="flex h-2 w-2 rounded-full bg-emerald-500 mr-2" title="Active"></span>'
                        : '<span class="flex h-2 w-2 rounded-full bg-slate-300 mr-2" title="Inactive"></span>';
                    return '<div class="flex items-center">' . $status . '<span class="font-bold text-slate-700">' . $row->title . '</span></div>';
                })
                ->addColumn('category_badge', function($row){
                    $color = match($row->category) {
                        'Important' => 'bg-orange-100 text-orange-700 border-orange-200',
                        'FAQ' => 'bg-teal-100 text-teal-700 border-teal-200',
                        default => 'bg-slate-100 text-slate-700 border-slate-200',
                    };
                    return '<span class="px-2.5 py-1 rounded-full text-[10px] font-bold uppercase tracking-wider border ' . $color . '">' . $row->category . '</span>';
                })
                ->addColumn('published_at_formatted', function($row){
                    return '<span class="text-slate-500 font-medium">' . ($row->published_at ? $row->published_at->format('d M Y') : 'N/A') . '</span>';
                })
                ->addColumn('action', function($row){
                    $btn = '<div class="flex items-center justify-end space-x-2">';
                    $btn .= '<a href="'.route('notices.edit', $row->id).'" class="p-2 text-indigo-600 hover:bg-indigo-50 rounded-lg transition-all duration-200" title="Edit Notice">
                                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z" /></svg>
                             </a>';
                    $btn .= '<form action="'.route('notices.destroy', $row->id).'" method="POST" class="inline">
                                '.csrf_field().'
                                '.method_field('DELETE').'
                                <button type="submit" class="p-2 text-rose-600 hover:bg-rose-50 rounded-lg transition-all duration-200" onclick="return confirm(\'Are you sure?\')" title="Delete Notice">
                                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" /></svg>
                                </button>
                             </form>';
                    $btn .= '</div>';
                    return $btn;
                })
                ->rawColumns(['title', 'category_badge', 'published_at_formatted', 'action'])
                ->make(true);
        }

        return view('notices.index');
    }

    public function create()
    {
        return view('notices.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'title'        => 'required|string|max:255',
            'content'      => 'nullable|string',
            'category'     => 'required|string',
            'is_active'    => 'nullable|boolean',
            'file'         => 'nullable|file|mimes:pdf,jpg,png,doc,docx|max:2048',
            'published_at' => 'nullable|date',
        ]);

        $data = [
            'title'        => $validated['title'],
            'content'      => $validated['content'] ?? null,
            'category'     => $validated['category'],
            'is_active'    => $validated['is_active'] ?? true,
            'published_at' => $validated['published_at'] ?? now(),
        ];

        if ($request->hasFile('file')) {
            $file        = $request->file('file');
            $filename    = time() . '_' . $file->getClientOriginalName();
            $destination = public_path('notices');

            if (!file_exists($destination)) {
                mkdir($destination, 0775, true);
            }

            $file->move($destination, $filename);
            $data['file_path'] = 'notices/' . $filename;
        }

        Notice::create($data);

        return redirect()->route('notices.index')
                         ->with('success', 'Notice created successfully.');
    }

    public function edit(Notice $notice)
    {
        return view('notices.edit', compact('notice'));
    }

    public function update(Request $request, Notice $notice)
    {
        $validated = $request->validate([
            'title'        => 'required|string|max:255',
            'content'      => 'nullable|string',
            'category'     => 'required|string',
            'is_active'    => 'nullable|boolean',
            'file'         => 'nullable|file|mimes:pdf,jpg,png,doc,docx|max:2048',
            'published_at' => 'nullable|date',
        ]);

        $data = [
            'title'        => $validated['title'],
            'content'      => $validated['content'] ?? null,
            'category'     => $validated['category'],
            'is_active'    => $validated['is_active'] ?? true,
            'published_at' => $validated['published_at'] ?? $notice->published_at,
        ];

        if ($request->hasFile('file')) {
            // Delete old file if exists
            if ($notice->file_path && file_exists(public_path($notice->file_path))) {
                unlink(public_path($notice->file_path));
            }

            $file        = $request->file('file');
            $filename    = time() . '_' . $file->getClientOriginalName();
            $destination = public_path('notices');

            if (!file_exists($destination)) {
                mkdir($destination, 0775, true);
            }

            $file->move($destination, $filename);
            $data['file_path'] = 'notices/' . $filename;
        }

        $notice->update($data);

        return redirect()->route('notices.index')
                         ->with('success', 'Notice updated successfully.');
    }

    public function destroy(Notice $notice)
    {
        // Delete file from public/notices/
        if ($notice->file_path && file_exists(public_path($notice->file_path))) {
            unlink(public_path($notice->file_path));
        }

        $notice->delete();

        return redirect()->route('notices.index')
                         ->with('success', 'Notice deleted successfully.');
    }
}