<x-app-layout>
    <div class="max-w-7xl mx-auto py-8 px-4 sm:px-6 lg:px-8">
        <!-- Header Section -->
        <div class="flex flex-col md:flex-row md:items-center justify-between mb-8 gap-4">
            <div>
                <h2 class="text-3xl font-extrabold text-slate-900 tracking-tight">Users Management</h2>
                <p class="text-slate-500 mt-1">Manage system access and roles for personnel.</p>
            </div>
            {{-- Only Super Admin can create users --}}
            @role('Super Admin')
            <div>
                <a href="{{ route('users.create') }}" class="inline-flex items-center px-5 py-2.5 bg-orange-600 border border-transparent rounded-xl font-bold text-white hover:bg-orange-700 active:bg-orange-800 transition-all shadow-lg shadow-orange-600/20">
                    <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6" />
                    </svg>
                    New User
                </a>
            </div>
            @endrole
        </div>

        <!-- Table Container -->
        <div class="bg-white rounded-3xl shadow-xl shadow-slate-200/60 overflow-hidden border border-slate-100">
            <div class="p-6 overflow-x-auto">
                <table id="users-table" class="w-full border-separate border-spacing-y-0.5">
                    <thead>
                        <tr class="bg-slate-50/50 text-slate-500 uppercase text-xs font-bold tracking-widest leading-none">
                            <th class="px-6 py-4 text-left border-b border-slate-100 first:rounded-tl-2xl">Sr. No.</th>
                            <th class="px-6 py-4 text-left border-b border-slate-100">Name</th>
                            <th class="px-6 py-4 text-left border-b border-slate-100">User Id</th>
                            <th class="px-6 py-4 text-left border-b border-slate-100">Roles</th>
                            <th class="px-6 py-4 text-left border-b border-slate-100">Location</th>
                            {{-- Must match the JS isSuperAdmin condition exactly --}}
                            @role('Super Admin')
                            <th class="px-6 py-4 text-right border-b border-slate-100 last:rounded-tr-2xl">Actions</th>
                            @endrole
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

        /* Search */
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

        /* Length select */
        .dataTables_length { margin-bottom: 1.5rem !important; float: right !important; }
        .dataTables_length select {
            width: 64px !important;
            border-radius: 8px !important;
            border: 1px solid #e2e8f0 !important;
            background: none !important;
        }

        /* Table */
        table.dataTable.no-footer { border-bottom: none !important; }
        table.dataTable tbody tr { transition: all 0.2s; }
        table.dataTable tbody tr:hover { background-color: #f8fafc !important; }
        table.dataTable tbody td { padding: 1.25rem 1.5rem !important; border-bottom: 1px solid #f1f5f9 !important; }

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
            border: none !important;
        }
    </style>
    @endpush

    @push('scripts')
    <script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
    <script src="https://cdn.datatables.net/1.13.7/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/responsive/2.5.0/js/dataTables.responsive.min.js"></script>
    <script>
        $(document).ready(function () {
            var isSuperAdmin = {{ auth()->user()->hasRole('Super Admin') ? 'true' : 'false' }};

            var columns = [
                { data: 'DT_RowIndex',    name: 'DT_RowIndex',   orderable: false, searchable: false },
                { data: 'name',           name: 'name' },
                { data: 'email',          name: 'email' },
                { data: 'role_name',      name: 'role_name',     orderable: false, searchable: false },
                { data: 'location_name',  name: 'location.name' },
            ];

            if (isSuperAdmin) {
                columns.push({
                    data: 'action',
                    name: 'action',
                    orderable: false,
                    searchable: false,
                    className: 'text-right'   // ← fixed from 'class'
                });
            }

            $('#users-table').DataTable({
                processing: true,
                serverSide: true,
                responsive: true,
                dom: '<"flex flex-col md:flex-row justify-between items-center mb-4"fl>rtip',
                ajax: "{{ route('users.index') }}",
                columns: columns,
                language: {
                    search: '',
                    searchPlaceholder: 'Search Personnel...',
                }
            });
        });
    </script>
    @endpush
</x-app-layout>