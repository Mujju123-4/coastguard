<x-app-layout>
    <div class="max-w-7xl mx-auto py-8 px-4 sm:px-6 lg:px-8">
        <!-- Header Section -->
        <div class="flex flex-col md:flex-row md:items-center justify-between mb-8 gap-4">
            <div>
                <h2 class="text-3xl font-extrabold text-slate-900 tracking-tight">Notice Master</h2>
                <p class="text-slate-500 mt-1">Broadcast important announcements and updates.</p>
            </div>
<<<<<<< HEAD
            {{-- Match the controller's Super Admin gate --}}
            @role('Super Admin')
            <div>
                <a href="{{ route('notices.create') }}" class="inline-flex items-center px-5 py-2.5 bg-orange-600 border border-transparent rounded-xl font-bold text-white hover:bg-orange-700 active:bg-orange-800 transition-all shadow-lg shadow-orange-600/20">
                    <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6" />
                    </svg>
                    New Notice
                </a>
            </div>
            @endrole
=======
            <div>
                <a href="{{ route('notices.create') }}" class="inline-flex items-center px-5 py-2.5 bg-orange-600 border border-transparent rounded-xl font-bold text-white hover:bg-orange-700 active:bg-orange-800 transition-all shadow-lg shadow-orange-600/20">
                    <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6" /></svg>
                    New Notice
                </a>
            </div>
>>>>>>> 89a3400d8febfa7c0af4cd0221386851a7d4c933
        </div>

        <!-- Table Container -->
        <div class="bg-white rounded-3xl shadow-xl shadow-slate-200/60 overflow-hidden border border-slate-100">
            <div class="p-6 overflow-x-auto">
                <table id="notices-table" class="w-full border-separate border-spacing-y-0.5">
                    <thead>
                        <tr class="bg-slate-50/50 text-slate-500 uppercase text-xs font-bold tracking-widest leading-none">
                            <th class="px-6 py-4 text-left border-b border-slate-100 first:rounded-tl-2xl">Sr. No.</th>
                            <th class="px-6 py-4 text-left border-b border-slate-100">Title</th>
                            <th class="px-6 py-4 text-left border-b border-slate-100">Category</th>
                            <th class="px-6 py-4 text-left border-b border-slate-100">Published</th>
<<<<<<< HEAD
                            {{-- Must match the JS isSuperAdmin condition exactly --}}
                            @role('Super Admin')
                            <th class="px-6 py-4 text-right border-b border-slate-100 last:rounded-tr-2xl">Actions</th>
                            @endrole
=======
                            <th class="px-6 py-4 text-right border-b border-slate-100 last:rounded-tr-2xl">Actions</th>
>>>>>>> 89a3400d8febfa7c0af4cd0221386851a7d4c933
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
        .dataTables_wrapper { padding-top: 0.5rem; }
<<<<<<< HEAD

        /* Search */
=======
>>>>>>> 89a3400d8febfa7c0af4cd0221386851a7d4c933
        .dataTables_filter { margin-bottom: 1.5rem !important; float: left !important; }
        .dataTables_filter input {
            background-color: #f8fafc !important;
            border: 1px solid #e2e8f0 !important;
            border-radius: 12px !important;
            padding: 0.6rem 1rem !important;
            width: 300px !important;
            margin-left: 0 !important;
        }
        .dataTables_filter input:focus {
            background-color: #fff !important;
            border-color: #ea580c !important;
            box-shadow: 0 0 0 4px rgba(234, 88, 12, 0.1) !important;
            outline: none !important;
        }
<<<<<<< HEAD

        /* Length select */
        .dataTables_length { margin-bottom: 1.5rem !important; float: right !important; }
        .dataTables_length select {
            width: 64px !important;
            border-radius: 8px !important;
            border: 1px solid #e2e8f0 !important;
        }

        /* Table */
=======
        .dataTables_length { margin-bottom: 1.5rem !important; float: right !important; }
        .dataTables_length select { border-radius: 8px !important; border: 1px solid #e2e8f0 !important; }
        
>>>>>>> 89a3400d8febfa7c0af4cd0221386851a7d4c933
        table.dataTable.no-footer { border-bottom: none !important; }
        table.dataTable tbody tr { transition: all 0.2s; }
        table.dataTable tbody tr:hover { background-color: #f8fafc !important; }
        table.dataTable tbody td { padding: 1.25rem 1.5rem !important; border-bottom: 1px solid #f1f5f9 !important; }
<<<<<<< HEAD

        /* Pagination */
        .dataTables_wrapper .dataTables_paginate .paginate_button {
            border-radius: 8px !important;
            border: none !important;
        }
        .dataTables_wrapper .dataTables_paginate .paginate_button.current,
        .dataTables_wrapper .dataTables_paginate .paginate_button.current:hover {
            background: #ea580c !important;
            color: white !important;
            border: none !important;
        }
        .dataTables_wrapper .dataTables_paginate .paginate_button:hover:not(.current):not(.disabled) {
            background: #fff7ed !important;
            color: #ea580c !important;
=======
        
        .dataTables_wrapper .dataTables_paginate .paginate_button.current {
            background: #ea580c !important;
            color: white !important;
            border-radius: 8px !important;
>>>>>>> 89a3400d8febfa7c0af4cd0221386851a7d4c933
            border: none !important;
        }
    </style>
    @endpush

    @push('scripts')
    <script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
    <script src="https://cdn.datatables.net/1.13.7/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/responsive/2.5.0/js/dataTables.responsive.min.js"></script>
    <script>
<<<<<<< HEAD
        $(document).ready(function () {
            var isSuperAdmin = {{ auth()->user()->hasRole('Super Admin') ? 'true' : 'false' }};

            var columns = [
                { data: 'DT_RowIndex',            name: 'DT_RowIndex',   orderable: false, searchable: false },
                { data: 'title',                  name: 'title' },
                { data: 'category_badge',         name: 'category',      orderable: false, searchable: false },
                { data: 'published_at_formatted', name: 'published_at' },
            ];

            if (isSuperAdmin) {
                columns.push({
                    data: 'action',
                    name: 'action',
                    orderable: false,
                    searchable: false,
                    className: 'text-right'   // ← was 'class', which DataTables ignores
                });
            }

=======
        $(document).ready(function() {
>>>>>>> 89a3400d8febfa7c0af4cd0221386851a7d4c933
            $('#notices-table').DataTable({
                processing: true,
                serverSide: true,
                responsive: true,
                dom: '<"flex flex-col md:flex-row justify-between items-center mb-4"fl>rtip',
                ajax: "{{ route('notices.index') }}",
<<<<<<< HEAD
                columns: columns,
                language: {
                    search: '',
                    searchPlaceholder: 'Search Notices...',
=======
                columns: [
                    { data: 'DT_RowIndex', name: 'DT_RowIndex', orderable: false, searchable: false },
                    { data: 'title', name: 'title' },
                    { data: 'category_badge', name: 'category', orderable: false, searchable: false },
                    { data: 'published_at_formatted', name: 'published_at' },
                    { data: 'action', name: 'action', orderable: false, searchable: false, class: 'text-right' }
                ],
                language: {
                    search: "",
                    searchPlaceholder: "Search Notices...",
>>>>>>> 89a3400d8febfa7c0af4cd0221386851a7d4c933
                },
                order: [[3, 'desc']]
            });
        });
    </script>
    @endpush
<<<<<<< HEAD
</x-app-layout>
=======
</x-app-layout>
>>>>>>> 89a3400d8febfa7c0af4cd0221386851a7d4c933
