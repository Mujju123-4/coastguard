<?php

namespace App\Http\Controllers;

use App\Models\ItemMaster;
use App\Models\Location;
use Illuminate\Http\Request;

use Illuminate\Routing\Controllers\HasMiddleware;
use Illuminate\Routing\Controllers\Middleware;

class ItemMasterController extends Controller implements HasMiddleware
{
    public static function middleware(): array
    {
        return [
            new Middleware('permission:view item masters', only: ['index', 'show']),
            new Middleware('permission:create item masters', only: ['create', 'store']),
            new Middleware('permission:edit item masters', only: ['edit', 'update']),
            new Middleware('permission:delete item masters', only: ['destroy']),
            new Middleware('permission:import item masters', only: ['import', 'upload']),
        ];
    }

    public function import()
    {
        return view('item_masters.import');
    }

    public function upload(Request $request)
    {
        $request->validate([
            'file' => 'required|file|mimes:csv,txt|max:2048',
        ]);

        $file = $request->file('file');
        $handle = fopen($file->getRealPath(), 'r');
        
        // Skip header
        fgetcsv($handle);

        $imported = 0;
        $errors = [];
        $rowNum = 1;

        while (($data = fgetcsv($handle)) !== false) {
            $rowNum++;
            // Expected format: Location, Code, Serial No, Equipment, Qty, UoM, Remarks
            if (count($data) < 6) {
                $errors[] = "Row {$rowNum}: Invalid column count.";
                continue;
            }

            [$locationName, $code, $serialNo, $equipment, $qty, $uom] = $data;
            $remarks = $data[6] ?? null;

            $location = Location::where('name', 'LIKE', trim($locationName))->first();

            if (!$location) {
                // Skip rows where location is not found, as per user request
                continue;
            }

            try {
                ItemMaster::updateOrCreate(
                    ['code' => trim($code)],
                    [
                        'location_id' => $location->id,
                        'serial_no' => trim($serialNo) ?: null,
                        'equipment' => trim($equipment),
                        'qty' => (int) trim($qty),
                        'uom' => trim($uom),
                        'remarks' => trim($remarks) ?: null,
                    ]
                );
                $imported++;
            } catch (\Exception $e) {
                $errors[] = "Row {$rowNum}: " . $e->getMessage();
            }
        }

        fclose($handle);

        if (count($errors) > 0) {
            return redirect()->route('item-masters.index')
                ->with('success', "Imported {$imported} items.")
                ->with('error', "Failed to import some rows: " . implode('<br>', array_slice($errors, 0, 10)) . (count($errors) > 10 ? '...' : ''));
        }

        return redirect()->route('item-masters.index')
            ->with('success', "Imported {$imported} items successfully.");
    }

    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        if ($request->ajax()) {
            $query = ItemMaster::with('location')->select('item_masters.*');

            // Apply location scoping for non-admins
            if (!auth()->user()->hasRole('Admin')) {
                $query->where('location_id', auth()->user()->location_id);
            }

            return \Yajra\DataTables\Facades\DataTables::of($query)
                ->addIndexColumn()
                ->addColumn('location_name', function($row){
                    return $row->location->name;
                })
                ->addColumn('action', function($row){
                    $btn = '';
                    if (auth()->user()->can('edit item masters')) {
                        $btn .= '<a href="'.route('item-masters.edit', $row->id).'" class="text-indigo-600 hover:text-indigo-900 mr-3">Edit</a>';
                    }
                    if (auth()->user()->can('delete item masters')) {
                        $btn .= '<form action="'.route('item-masters.destroy', $row->id).'" method="POST" class="inline">
                                    '.csrf_field().'
                                    '.method_field('DELETE').'
                                    <button type="submit" class="text-rose-600 hover:text-rose-900" onclick="return confirm(\'Are you sure?\')">Delete</button>
                                 </form>';
                    }
                    return $btn;
                })
                ->rawColumns(['action'])
                ->make(true);
        }

        return view('item_masters.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $user = auth()->user();
        $locations = $user->hasRole('Admin') 
            ? Location::all() 
            : Location::where('id', $user->location_id)->get();
            
        $uoms = ['kg', 'pc', 'pcs', 'set', 'sets'];
        return view('item_masters.create', compact('locations', 'uoms'));
    }

    /**
     * Store a newly created resource in the storage.
     */
    public function store(Request $request)
    {
        $user = auth()->user();
        $locConstraint = $user->hasRole('Admin') ? 'exists:locations,id' : 'in:'.$user->location_id;

        $request->validate([
            'location_id' => 'required|' . $locConstraint,
            'code' => 'required|string|unique:item_masters,code|max:255',
            'serial_no' => 'nullable|string|max:255',
            'equipment' => 'required|string',
            'qty' => 'required|integer|min:0',
            'uom' => 'required|string|in:kg,pc,pcs,set,sets',
            'remarks' => 'nullable|string',
        ]);

        ItemMaster::create($request->all());

        return redirect()->route('item-masters.index')
            ->with('success', 'Item created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(ItemMaster $itemMaster)
    {
        if (!auth()->user()->hasRole('Admin') && $itemMaster->location_id !== auth()->user()->location_id) {
            abort(403, 'Unauthorized access to this location\'s items.');
        }
        return view('item_masters.show', compact('itemMaster'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(ItemMaster $itemMaster)
    {
        $user = auth()->user();
        if (!$user->hasRole('Admin') && $itemMaster->location_id !== $user->location_id) {
            abort(403, 'Unauthorized access to this location\'s items.');
        }

        $locations = $user->hasRole('Admin') 
            ? Location::all() 
            : Location::where('id', $user->location_id)->get();
            
        $uoms = ['kg', 'pc', 'pcs', 'set', 'sets'];
        return view('item_masters.edit', compact('itemMaster', 'locations', 'uoms'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, ItemMaster $itemMaster)
    {
        $user = auth()->user();
        if (!$user->hasRole('Admin') && $itemMaster->location_id !== $user->location_id) {
            abort(403, 'Unauthorized access to this location\'s items.');
        }

        $locConstraint = $user->hasRole('Admin') ? 'exists:locations,id' : 'in:'.$user->location_id;

        $request->validate([
            'location_id' => 'required|' . $locConstraint,
            'code' => 'required|string|unique:item_masters,code,' . $itemMaster->id . '|max:255',
            'serial_no' => 'nullable|string|max:255',
            'equipment' => 'required|string',
            'qty' => 'required|integer|min:0',
            'uom' => 'required|string|in:kg,pc,pcs,set,sets',
            'remarks' => 'nullable|string',
        ]);

        $itemMaster->update($request->all());

        return redirect()->route('item-masters.index')
            ->with('success', 'Item updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(ItemMaster $itemMaster)
    {
        if (!auth()->user()->hasRole('Admin') && $itemMaster->location_id !== auth()->user()->location_id) {
            abort(403, 'Unauthorized access to this location\'s items.');
        }
        
        $itemMaster->delete();

        return redirect()->route('item-masters.index')
            ->with('success', 'Item deleted successfully.');
    }
}
