<x-app-layout>
    <div class="max-w-7xl mx-auto py-10 sm:px-6 lg:px-8">
        <div class="flex justify-between items-center mb-6">
            <h2 class="text-2xl font-semibold text-slate-800">Item Master</h2>
            <div class="space-x-2">
                @can('import item masters')
                <a href="{{ route('item-masters.import') }}" class="bg-slate-800 hover:bg-slate-700 text-white font-bold py-2 px-4 rounded transition-colors">
                    Import Items
                </a>
                @endcan
                
                @can('create item masters')
                <a href="{{ route('item-masters.create') }}" class="bg-orange-600 hover:bg-orange-700 text-white font-bold py-2 px-4 rounded transition-colors">
                    Add New Item
                </a>
                @endcan
            </div>
        </div>

        <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg p-6">
            <table id="item-master-table" class="min-w-full divide-y divide-slate-200">
                <thead class="bg-slate-50">
                    <tr>
                        <th class="px-6 py-3 text-left text-xs font-medium text-slate-500 uppercase tracking-wider">Location</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-slate-500 uppercase tracking-wider">Code</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-slate-500 uppercase tracking-wider">Serial No</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-slate-500 uppercase tracking-wider">Equipment</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-slate-500 uppercase tracking-wider">Qty</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-slate-500 uppercase tracking-wider">UoM</th>
                        <th class="px-6 py-3 text-right text-xs font-medium text-slate-500 uppercase tracking-wider">Actions</th>
                    </tr>
                </thead>
                <tbody class="bg-white divide-y divide-slate-200">
                    <!-- DataTables will populate this -->
                </tbody>
            </table>
        </div>
    </div>

    @push('styles')
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.7/css/jquery.dataTables.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/responsive/2.5.0/css/responsive.dataTables.min.css">
    <style>
        .dataTables_wrapper .dataTables_paginate .paginate_button.current {
            background: #ea580c !important;
            color: white !important;
            border: none !important;
        }
        .dataTables_wrapper .dataTables_filter input {
            border-radius: 0.375rem;
            border: 1px solid #cbd5e1;
            padding: 0.5rem;
        }
    </style>
    @endpush

    @push('scripts')
    <script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
    <script src="https://cdn.datatables.net/1.13.7/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/responsive/2.5.0/js/dataTables.responsive.min.js"></script>
    <script>
        $(document).ready(function() {
            $('#item-master-table').DataTable({
                processing: true,
                serverSide: true,
                responsive: true,
                ajax: "{{ route('item-masters.index') }}",
                columns: [
                    { data: 'location_name', name: 'location.name' },
                    { data: 'code', name: 'code' },
                    { data: 'serial_no', name: 'serial_no' },
                    { data: 'equipment', name: 'equipment' },
                    { data: 'qty', name: 'qty' },
                    { data: 'uom', name: 'uom' },
                    { data: 'action', name: 'action', orderable: false, searchable: false, class: 'text-right' }
                ]
            });
        });
    </script>
    @endpush
</x-app-layout>
