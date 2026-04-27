<?php

namespace App\Http\Controllers;

use App\Models\Location;
use Illuminate\Http\Request;

class LocationController extends Controller
{
    /**
     * Display a listing of the resource.
     */
<<<<<<< HEAD
public function index(Request $request)
{
    if ($request->ajax()) {
        $query = Location::query();

        return \Yajra\DataTables\Facades\DataTables::of($query)
            ->addIndexColumn()
            ->addColumn('name', function ($row) {
                return '
                    <div class="flex items-center">
                        <div class="w-8 h-8 rounded-lg bg-orange-50 flex items-center justify-center mr-3">
                            <svg class="w-4 h-4 text-orange-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z" />
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z" />
                            </svg>
                        </div>
                        <span class="font-bold text-slate-700">' . e($row->name) . '</span>
                    </div>';
            })
            ->addColumn('action', function ($row) {
                // Return empty string for non-Super Admin users
                if (! auth()->user()->hasRole('Super Admin')) {
                    return '';
                }

                $editUrl   = route('locations.edit', $row->id);
                $deleteUrl = route('locations.destroy', $row->id);

                return '
                    <div class="flex items-center justify-end space-x-2">
                        <a href="' . $editUrl . '" 
                           class="p-2 text-indigo-600 hover:bg-indigo-50 rounded-lg transition-all duration-200" 
                           title="Edit Location">
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z" />
                            </svg>
                        </a>
                        <form action="' . $deleteUrl . '" method="POST" class="inline">
                            ' . csrf_field() . '
                            ' . method_field('DELETE') . '
                            <button type="submit" 
                                    class="p-2 text-rose-600 hover:bg-rose-50 rounded-lg transition-all duration-200" 
                                    onclick="return confirm(\'Are you sure?\')" 
                                    title="Delete Location">
                                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
                                </svg>
                            </button>
                        </form>
                    </div>';
            })
            ->rawColumns(['name', 'action'])
            ->make(true);
=======
    public function index(Request $request)
    {
        if ($request->ajax()) {
            $query = Location::query();
            
            return \Yajra\DataTables\Facades\DataTables::of($query)
                ->addIndexColumn()
                ->addColumn('name', function($row){
                    return '<div class="flex items-center">
                                <div class="w-8 h-8 rounded-lg bg-orange-50 flex items-center justify-center mr-3">
                                    <svg class="w-4 h-4 text-orange-600" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z" /><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z" /></svg>
                                </div>
                                <span class="font-bold text-slate-700">' . $row->name . '</span>
                            </div>';
                })
                ->addColumn('action', function($row){
                    $btn = '<div class="flex items-center justify-end space-x-2">';
                    $btn .= '<a href="'.route('locations.edit', $row->id).'" class="p-2 text-indigo-600 hover:bg-indigo-50 rounded-lg transition-all duration-200" title="Edit Location">
                                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z" /></svg>
                             </a>';
                    $btn .= '<form action="'.route('locations.destroy', $row->id).'" method="POST" class="inline">
                                '.csrf_field().'
                                '.method_field('DELETE').'
                                <button type="submit" class="p-2 text-rose-600 hover:bg-rose-50 rounded-lg transition-all duration-200" onclick="return confirm(\'Are you sure?\')" title="Delete Location">
                                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" /></svg>
                                </button>
                             </form>';
                    $btn .= '</div>';
                    return $btn;
                })
                ->rawColumns(['name', 'action'])
                ->make(true);
        }

        return view('locations.index');
>>>>>>> 89a3400d8febfa7c0af4cd0221386851a7d4c933
    }

    return view('locations.index');
}

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('locations.create');
    }

    /**
     * Store a newly created resource in the storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|unique:locations,name|max:255',
        ]);

        Location::create($request->all());

        return redirect()->route('locations.index')
            ->with('success', 'Location created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Location $location)
    {
        return view('locations.show', compact('location'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Location $location)
    {
        return view('locations.edit', compact('location'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Location $location)
    {
        $request->validate([
            'name' => 'required|string|unique:locations,name,' . $location->id . '|max:255',
        ]);

        $location->update($request->all());

        return redirect()->route('locations.index')
            ->with('success', 'Location updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Location $location)
    {
        $location->delete();

        return redirect()->route('locations.index')
            ->with('success', 'Location deleted successfully.');
    }
    
    
    public function contactDetails(){
        
        return view('contact_detaills');
    }
}
