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
            new Middleware('permission:view item masters',   only: ['index', 'show', 'exportCsv']),
            new Middleware('permission:create item masters', only: ['create', 'store']),
            new Middleware('permission:edit item masters',   only: ['edit', 'update']),
            new Middleware('permission:delete item masters', only: ['destroy']),
            new Middleware('permission:import item masters', only: ['import', 'upload']),
        ];
    }

    public function import()
    {
        if (!auth()->user()->hasAnyRole(['Superadmin', 'Super Admin'])) {
            abort(403, 'Unauthorized access to Import features.');
        }
        return view('item_masters.import');
    }

    public function upload(Request $request)
    {
        if (!auth()->user()->hasAnyRole(['Superadmin', 'Super Admin'])) {
            abort(403, 'Unauthorized access to Import features.');
        }
        $request->validate([
            'file' => 'required|file|mimes:csv,txt|max:2048',
        ]);

        $file   = $request->file('file');
        $handle = fopen($file->getRealPath(), 'r');

        // Skip header row
        fgetcsv($handle);

        $imported = 0;
        $errors   = [];
        $rowNum   = 1;

        while (($data = fgetcsv($handle)) !== false) {
            $rowNum++;
            // Expected: Location, Code, Serial No, Equipment, Qty, UoM, Remarks
            if (count($data) < 6) {
                $errors[] = "Row {$rowNum}: Invalid column count.";
                continue;
            }

            [$locationName, $code, $serialNo, $equipment, $qty, $uom] = $data;
            $remarks = $data[6] ?? null;

            $location = Location::where('name', 'LIKE', trim($locationName))->first();

            if (!$location) {
                continue; // Skip rows with unknown location
            }

            try {
                ItemMaster::updateOrCreate(
                    ['code' => trim($code)],
                    [
                        'location_id' => $location->id,
                        'serial_no'   => trim($serialNo) ?: null,
                        'equipment'   => trim($equipment),
                        'qty'         => (int) trim($qty),
                        'uom'         => trim($uom),
                        'remarks'     => trim($remarks) ?: null,
                        'status'      => strtolower(trim($data[7] ?? 'operational')),
                        'status_reason' => trim($data[8] ?? null),
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

    public function exportCsv(Request $request)
    {
        $query = ItemMaster::with('location')->latest();

        // Scope non-admins to their own location
        // Scope non-admins to their own location
        if (!auth()->user()->hasAnyRole(['Admin', 'Superadmin', 'Super Admin'])) {
            $query->where('location_id', auth()->user()->location_id);
        }

        // Apply filters if any
        if ($request->filled('location_id')) {
            $query->where('location_id', $request->location_id);
        }

        $items = $query->get();
        $filename = "item_master_list_" . date('Y-m-d_H-i-s') . ".csv";
        $handle = fopen('php://memory', 'w');

        // CSV Header
<<<<<<< HEAD
        fputcsv($handle, ['Location', 'Code', 'Serial No', 'Equipment', 'Qty', 'UoM', 'Serviced Date', 'Remarks', 'Status', 'Reason']);
=======
        fputcsv($handle, ['Location', 'Code', 'Serial No', 'Equipment', 'Qty', 'UoM', 'Remarks', 'Status', 'Reason']);
>>>>>>> 89a3400d8febfa7c0af4cd0221386851a7d4c933

        foreach ($items as $item) {
            fputcsv($handle, [
                $item->location->name ?? '',
                $item->code,
                $item->serial_no ?? '',
                $item->equipment,
                $item->qty,
                $item->uom,
<<<<<<< HEAD
                $item->serviced_date ? \Carbon\Carbon::parse($item->serviced_date)->format('Y-m-d') : '',
=======
>>>>>>> 89a3400d8febfa7c0af4cd0221386851a7d4c933
                $item->remarks ?? '',
                ucfirst($item->status),
                $item->status_reason ?? ''
            ]);
        }

        rewind($handle);
        $callback = function() use ($handle) {
            fpassthru($handle);
            fclose($handle);
        };

        return response()->stream($callback, 200, [
            "Content-type"        => "text/csv",
            "Content-Disposition" => "attachment; filename={$filename}",
            "Pragma"              => "no-cache",
            "Cache-Control"       => "must-revalidate, post-check=0, pre-check=0",
            "Expires"             => "0"
        ]);
    }

    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        if ($request->ajax()) {
            $query = ItemMaster::with('location')
                               ->withCount([
                                   'tickets as tickets_count',
                                   'tickets as open_tickets_count' => fn ($q) => $q->where('status', 'open'),
                               ])
                               ->select('item_masters.*');

            // Scope non-admins to their own location
            if (!auth()->user()->hasAnyRole(['Admin', 'Superadmin', 'Super Admin'])) {
                $query->where('location_id', auth()->user()->location_id);
            }

            // Custom location filter from UI
            if ($request->filled('location_id')) {
                $query->where('location_id', $request->location_id);
            }

            return \Yajra\DataTables\Facades\DataTables::of($query)
                ->addIndexColumn()

                ->addColumn('location_name', function ($row) {
                    return '<span class="px-2.5 py-1 rounded-full text-xs font-semibold bg-slate-100 text-slate-800 border border-slate-200 uppercase tracking-tight">'
                        . e($row->location->name)
                        . '</span>';
                })

                ->addColumn('qty', function ($row) {
                    return '<span class="font-bold text-slate-900">' . $row->qty . '</span>';
                })

<<<<<<< HEAD
                ->addColumn('serviced_date', function ($row) {
                    if (!$row->serviced_date) {
                        return '<span class="text-slate-400 italic text-xs">Not Serviced</span>';
                    }
                    return '<span class="font-semibold text-slate-700 text-xs">' . \Carbon\Carbon::parse($row->serviced_date)->format('d M, Y') . '</span>';
                })

                ->addColumn('uom', function ($row) {
                    return '<span class="ml-1 text-[10px] font-bold text-slate-400 border border-slate-200 px-1.5 py-0.5 rounded uppercase font-mono">'
                        . e($row->uom)
                        . '</span>';
                })

                ->addColumn('action', function ($row) {
                    $btn = '<div class="flex items-center justify-end space-x-2">';

                    // ── Edit ──────────────────────────────────────────────
                    if (auth()->user()->can('edit item masters')) {
                        $btn .= '<a href="' . route('item-masters.edit', $row->id) . '"
                                    class="p-2 text-indigo-600 hover:bg-indigo-50 rounded-lg transition-all duration-200"
                                    title="Edit Item">
                                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                              d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5
                                                 m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"/>
                                    </svg>
                                 </a>';
                    }
=======
                ->addColumn('uom', function ($row) {
                    return '<span class="ml-1 text-[10px] font-bold text-slate-400 border border-slate-200 px-1.5 py-0.5 rounded uppercase font-mono">'
                        . e($row->uom)
                        . '</span>';
                })

                ->addColumn('action', function ($row) {
                    $btn = '<div class="flex items-center justify-end space-x-2">';

                    // ── Edit ──────────────────────────────────────────────
                    if (auth()->user()->can('edit item masters')) {
                        $btn .= '<a href="' . route('item-masters.edit', $row->id) . '"
                                    class="p-2 text-indigo-600 hover:bg-indigo-50 rounded-lg transition-all duration-200"
                                    title="Edit Item">
                                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                              d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5
                                                 m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"/>
                                    </svg>
                                 </a>';
                    }
>>>>>>> 89a3400d8febfa7c0af4cd0221386851a7d4c933

                    // ── Delete ────────────────────────────────────────────
                    if (auth()->user()->can('delete item masters')) {
                        $btn .= '<form action="' . route('item-masters.destroy', $row->id) . '" method="POST" class="inline">
                                    ' . csrf_field() . '
                                    ' . method_field('DELETE') . '
                                    <button type="submit"
                                            class="p-2 text-rose-600 hover:bg-rose-50 rounded-lg transition-all duration-200"
                                            onclick="return confirm(\'Are you sure you want to delete this item?\')"
                                            title="Delete Item">
                                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                  d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858
                                                     L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"/>
                                        </svg>
                                    </button>
                                 </form>';
                    }

                    // ── Raise Ticket ──────────────────────────────────────
                    // Button uses data-item attribute (JSON) + class "btn-raise-ticket".
                    // Shows a badge with the open ticket count for this item.
                    if (auth()->user()->can('raise tickets')) {
                        $openCount = (int) ($row->open_tickets_count ?? 0);

                        $itemJson = htmlspecialchars(json_encode([
                            'id'        => $row->id,
                            'code'      => $row->code,
                            'equipment' => $row->equipment,
                            'serial_no' => $row->serial_no ?? '',
                            'location'  => $row->location->name ?? '',
                            'qty'       => $row->qty,
                            'uom'       => $row->uom,
                            'remarks'   => $row->remarks ?? '',
                        ]), ENT_QUOTES, 'UTF-8');

                        $badge = $openCount > 0
                            ? '<span style="position:absolute;top:-4px;right:-4px;min-width:14px;height:14px;'
                              . 'background:#dc2626;color:#fff;font-size:9px;font-weight:800;'
                              . 'border-radius:999px;display:flex;align-items:center;justify-content:center;'
                              . 'border:2px solid #fff;padding:0 2px;line-height:1;">'
                              . $openCount . '</span>'
                            : '';

                        $btn .= '<button
                                    type="button"
                                    class="btn-raise-ticket p-2 text-green-600 hover:bg-green-50 rounded-lg transition-all duration-200"
                                    style="position:relative;"
                                    title="Raise Ticket' . ($openCount > 0 ? ' (' . $openCount . ' open)' : '') . '"
                                    data-item="' . $itemJson . '">
                                    ' . $badge . '
                                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                              d="M9 12h3.75M9 15h3.75M9 18h3.75m3 .75H18a2.25 2.25 0 002.25-2.25V6.108c0-1.135-.845-2.098-1.976-2.192a48.424 48.424 0 00-1.123-.08m-5.801 0c-.065.21-.1.433-.1.664 0 .414.336.75.75.75h4.5a.75.75 0 00.75-.75 2.25 2.25 0 00-.1-.664m-5.8 0A2.251 2.251 0 0113.5 2.25H15c1.012 0 1.867.668 2.15 1.586m-5.8 0c-.376.023-.75.05-1.124.08C9.095 4.01 8.25 4.973 8.25 6.108V8.25m0 0H4.875c-.621 0-1.125.504-1.125 1.125v11.25c0 .621.504 1.125 1.125 1.125h9.75c.621 0 1.125-.504 1.125-1.125V9.375c0-.621-.504-1.125-1.125-1.125H8.25zM6.75 12h.008v.008H6.75V12zm0 3h.008v.008H6.75V15zm0 3h.008v.008H6.75V18z"/>
                                    </svg>
                                 </button>';
                    }

                    $btn .= '</div>';
                    return $btn;
                })

<<<<<<< HEAD
                ->rawColumns(['location_name', 'qty', 'uom', 'serviced_date', 'status', 'action'])
=======
                ->rawColumns(['location_name', 'qty', 'uom', 'status', 'action'])
>>>>>>> 89a3400d8febfa7c0af4cd0221386851a7d4c933
                ->make(true);
        }

        $locations = auth()->user()->hasAnyRole(['Admin', 'Superadmin', 'Super Admin'])
            ? Location::all()
            : Location::where('id', auth()->user()->location_id)->get();

        return view('item_masters.index', compact('locations'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $user      = auth()->user();
        $locations = $user->hasAnyRole(['Admin', 'Superadmin', 'Super Admin'])
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
        $user          = auth()->user();
        $locConstraint = $user->hasAnyRole(['Admin', 'Superadmin', 'Super Admin']) ? 'exists:locations,id' : 'in:' . $user->location_id;

        $request->validate([
            'location_id' => 'required|' . $locConstraint,
            'code'        => 'required|string|unique:item_masters,code|max:255',
            'serial_no'   => 'nullable|string|max:255',
            'equipment'   => 'required|string',
            'qty'         => 'required|integer|min:0',
            'uom'         => 'required|string|in:kg,pc,pcs,set,sets',
            'remarks'     => 'nullable|string',
<<<<<<< HEAD
            'status'      => 'nullable|in:operational,non-operational',
            'status_reason' => 'nullable|required_if:status,non-operational|string',
            'serviced_date' => 'nullable|date',
=======
            'status'      => 'required|in:operational,non-operational',
            'status_reason' => 'nullable|required_if:status,non-operational|string',
>>>>>>> 89a3400d8febfa7c0af4cd0221386851a7d4c933
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
        if (!auth()->user()->hasAnyRole(['Admin', 'Superadmin', 'Super Admin']) && $itemMaster->location_id !== auth()->user()->location_id) {
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
        if (!$user->hasAnyRole(['Admin', 'Superadmin', 'Super Admin']) && $itemMaster->location_id !== $user->location_id) {
            abort(403, 'Unauthorized access to this location\'s items.');
        }

        $locations = $user->hasAnyRole(['Admin', 'Superadmin', 'Super Admin'])
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
        if (!$user->hasAnyRole(['Admin', 'Superadmin', 'Super Admin']) && $itemMaster->location_id !== $user->location_id) {
            abort(403, 'Unauthorized access to this location\'s items.');
        }

        $locConstraint = $user->hasAnyRole(['Admin', 'Superadmin', 'Super Admin']) ? 'exists:locations,id' : 'in:' . $user->location_id;

        $request->validate([
            'location_id' => 'required|' . $locConstraint,
            'code'        => 'required|string|unique:item_masters,code,' . $itemMaster->id . '|max:255',
            'serial_no'   => 'nullable|string|max:255',
            'equipment'   => 'required|string',
            'qty'         => 'required|integer|min:0',
            'uom'         => 'required|string|in:kg,pc,pcs,set,sets',
            'remarks'     => 'nullable|string',
<<<<<<< HEAD
            'status'      => 'nullable|in:operational,non-operational',
            'status_reason' => 'nullable|required_if:status,non-operational|string',
            'serviced_date' => 'nullable|date',
=======
            'status'      => 'required|in:operational,non-operational',
            'status_reason' => 'nullable|required_if:status,non-operational|string',
>>>>>>> 89a3400d8febfa7c0af4cd0221386851a7d4c933
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
        if (!auth()->user()->hasAnyRole(['Admin', 'Superadmin', 'Super Admin']) && $itemMaster->location_id !== auth()->user()->location_id) {
            abort(403, 'Unauthorized access to this location\'s items.');
        }

        $itemMaster->delete();

        return redirect()->route('item-masters.index')
            ->with('success', 'Item deleted successfully.');
    }
}
