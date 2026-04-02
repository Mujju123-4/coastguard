<x-app-layout>
    <div class="max-w-7xl mx-auto py-8 px-4 sm:px-6 lg:px-8">
        <!-- Header Section -->
        <div class="flex flex-col md:flex-row md:items-end justify-between mb-8 gap-6">
            <!-- Title Section -->
            <div class="flex-1 min-w-0">
                <div class="flex items-center">
                    <div class="p-3 bg-orange-600 rounded-2xl shadow-lg shadow-orange-600/30 mr-4">
                        <svg class="w-7 h-7 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20 7l-8-4-8 4m16 0l-8 4m8-4v10l-8 4m0-10L4 7m8 4v10M4 7v10l8 4" />
                        </svg>
                    </div>
                    <div>
                        <h2 class="text-3xl font-black text-slate-900 tracking-tight">Item Master</h2>
                        <div class="flex items-center mt-1 text-slate-500 font-medium text-sm">
                            <span class="flex h-2 w-2 rounded-full bg-orange-500 mr-2"></span>
                            Inventory Management System
                        </div>
                    </div>
                </div>
            </div>
            
            <!-- Unified Action Bar -->
            <div class="flex flex-wrap items-center gap-3 bg-white p-2 rounded-[22px] border border-slate-100 shadow-xl shadow-slate-200/50">
                <!-- Location Filter Group -->
                <div class="relative group pl-2">
                    <div class="absolute left-4 top-1/2 -translate-y-1/2 text-slate-400 group-hover:text-orange-500 transition-colors pointer-events-none">
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z" />
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z" />
                        </svg>
                    </div>
                    <select id="location_filter" class="pl-10 pr-10 py-2.5 bg-slate-50 border-none rounded-xl text-sm font-bold text-slate-700 hover:bg-slate-100 focus:ring-0 transition-all appearance-none cursor-pointer min-w-[200px]">
                        <option value="">All Locations</option>
                        @foreach($locations as $location)
                            <option value="{{ $location->id }}">{{ $location->name }}</option>
                        @endforeach
                    </select>
                </div>
                
                <div class="h-8 w-px bg-slate-100 mx-1"></div>

                @can('import item masters')
                <a href="{{ route('item-masters.import') }}" class="p-2.5 text-slate-500 hover:text-orange-600 hover:bg-orange-50 rounded-xl transition-all group" title="Import CSV">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16v1a2 2 0 002 2h12a2 2 0 002-2v-1m-4-8l-4-4m0 0L8 8m4-4v12" />
                    </svg>
                </a>
                @endcan

                @can('create item masters')
                <a href="{{ route('item-masters.create') }}" class="inline-flex items-center px-6 py-2.5 bg-slate-900 border border-slate-900 rounded-xl font-bold text-white hover:bg-orange-600 hover:border-orange-600 active:scale-95 transition-all shadow-lg shadow-slate-900/10 hover:shadow-orange-600/20">
                    <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6" />
                    </svg>
                    New Item
                </a>
                @endcan
            </div>
        </div>

        <!-- Table Container -->
        <div class="bg-white rounded-3xl shadow-xl shadow-slate-200/60 overflow-hidden border border-slate-100">
            <div class="p-6 overflow-x-auto">
                <table id="item-master-table" class="w-full border-separate border-spacing-y-0.5">
                    <thead>
                        <tr class="bg-slate-50/50">
                            <th class="px-6 py-4 text-left text-xs font-bold text-slate-500 uppercase tracking-widest border-b border-slate-100 first:rounded-tl-2xl">Sr. No.</th>
                            <th class="px-6 py-4 text-left text-xs font-bold text-slate-500 uppercase tracking-widest border-b border-slate-100">Location</th>
                            <th class="px-6 py-4 text-left text-xs font-bold text-slate-500 uppercase tracking-widest border-b border-slate-100">Code</th>
                            <th class="px-6 py-4 text-left text-xs font-bold text-slate-500 uppercase tracking-widest border-b border-slate-100">Serial No</th>
                            <th class="px-6 py-4 text-left text-xs font-bold text-slate-500 uppercase tracking-widest border-b border-slate-100">Equipment</th>
                            <th class="px-6 py-4 text-left text-xs font-bold text-slate-500 uppercase tracking-widest border-b border-slate-100">Qty / UoM</th>
                            <th class="px-6 py-4 text-right text-xs font-bold text-slate-500 uppercase tracking-widest border-b border-slate-100 last:rounded-tr-2xl">Actions</th>
                        </tr>
                    </thead>
                    <tbody class="text-slate-600">
                        <!-- DataTables will populate this -->
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    @push('styles')
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.7/css/jquery.dataTables.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/responsive/2.5.0/css/responsive.dataTables.min.css">
    <style>
        /* Modern DataTable Overrides */
        .dataTables_wrapper { padding-top: 0.5rem; }
        .dataTables_filter { margin-bottom: 1.5rem !important; float: left !important; }
        .dataTables_filter input {
            background-color: #f8fafc !important;
            border: 1px solid #e2e8f0 !important;
            border-radius: 12px !important;
            padding: 0.6rem 1rem !important;
            width: 300px !important;
            margin-left: 0 !important;
            transition: all 0.2s;
        }
        .dataTables_filter input:focus {
            background-color: #fff !important;
            border-color: #ea580c !important;
            box-shadow: 0 0 0 4px rgba(234, 88, 12, 0.1) !important;
            outline: none !important;
        }
        .dataTables_length { margin-bottom: 1.5rem !important; float: right !important; }
        .dataTables_length select {
            border: 1px solid #e2e8f0 !important;
            border-radius: 8px !important;
            padding: 0.4rem 2rem 0.4rem 0.8rem !important;
        }
        
        table.dataTable.no-footer { border-bottom: none !important; }
        table.dataTable tbody tr { background-color: transparent !important; transition: all 0.2s; }
        table.dataTable tbody tr:hover { background-color: #f8fafc !important; transform: scale(1.002); }
        table.dataTable tbody td { padding: 1.25rem 1.5rem !important; border-bottom: 1px solid #f1f5f9 !important; }
        
        /* Pagination Styling */
        .dataTables_wrapper .dataTables_paginate .paginate_button {
            border-radius: 8px !important;
            border: 1px solid transparent !important;
            margin: 0 2px !important;
            padding: 0.4rem 0.8rem !important;
        }
        .dataTables_wrapper .dataTables_paginate .paginate_button.current {
            background: #ea580c !important;
            color: white !important;
            border-color: #ea580c !important;
        }
        .dataTables_wrapper .dataTables_paginate .paginate_button:hover {
            background: #fff7ed !important;
            color: #ea580c !important;
            border-color: #fdba74 !important;
        }
    </style>
    @endpush

    @push('scripts')
    <script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
    <script src="https://cdn.datatables.net/1.13.7/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/responsive/2.5.0/js/dataTables.responsive.min.js"></script>
    <script>
        $(document).ready(function() {
            var table = $('#item-master-table').DataTable({
                processing: true,
                serverSide: true,
                responsive: true,
                dom: '<"flex flex-col md:flex-row justify-between items-center mb-4"fl>rtip',
                ajax: {
                    url: "{{ route('item-masters.index') }}",
                    data: function (d) {
                        d.location_id = $('#location_filter').val();
                    }
                },
                columns: [
                    { data: 'DT_RowIndex', name: 'DT_RowIndex', orderable: false, searchable: false },
                    { data: 'location_name', name: 'location.name' },
                    { data: 'code', name: 'code' },
                    { data: 'serial_no', name: 'serial_no' },
                    { data: 'equipment', name: 'equipment' },
                    { 
                        data: 'qty', 
                        name: 'qty',
                        render: function(data, type, row) {
                            return data + '<span class="ml-1 text-[10px] font-bold text-slate-400 uppercase font-mono">' + row.uom + '</span>';
                        }
                    },
                    { data: 'action', name: 'action', orderable: false, searchable: false, class: 'text-right' }
                ],
                language: {
                    search: "",
                    searchPlaceholder: "Search Item Master...",
                    lengthMenu: "Show _MENU_ items"
                }
            });

            $('#location_filter').change(function(){
                table.draw();
            });
        });
    </script>
    @endpush
</x-app-layout>
