<?php if (isset($component)) { $__componentOriginal9ac128a9029c0e4701924bd2d73d7f54 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal9ac128a9029c0e4701924bd2d73d7f54 = $attributes; } ?>
<?php $component = App\View\Components\AppLayout::resolve([] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('app-layout'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\App\View\Components\AppLayout::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>
    <div class="max-w-7xl mx-auto py-8 px-4 sm:px-6 lg:px-8">

        <!-- Page Header -->
        <div class="flex flex-col md:flex-row md:items-center justify-between mb-8 gap-4">
            <div>
                <h2 class="text-3xl font-extrabold text-slate-900 tracking-tight">Location Master</h2>
                <p class="text-slate-500 mt-1">Manage coastal stations and vessel headquarters.</p>
            </div>
            <?php if (\Illuminate\Support\Facades\Blade::check('role', 'Super Admin')): ?>
            <a href="<?php echo e(route('locations.create')); ?>"
               class="inline-flex items-center px-5 py-2.5 bg-orange-600 border border-transparent rounded-xl font-bold text-white hover:bg-orange-700 active:bg-orange-800 transition-all shadow-lg shadow-orange-600/20">
                <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6" />
                </svg>
                New Location
            </a>
            <?php endif; ?>
        </div>

        <!-- Table Card -->
        <div class="bg-white rounded-3xl shadow-xl shadow-slate-200/60 border border-slate-100 overflow-hidden">

            <!-- Card Top Bar: Search + Length (custom, rendered BEFORE DataTable) -->
            <div class="flex flex-col sm:flex-row sm:items-center justify-between gap-3 px-6 py-4 border-b border-slate-100 bg-slate-50/60">
                <!-- Search -->
                <div class="relative">
                    <div class="pointer-events-none absolute inset-y-0 left-3 flex items-center">
                        <svg class="w-4 h-4 text-slate-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                  d="M21 21l-4.35-4.35M17 11A6 6 0 115 11a6 6 0 0112 0z"/>
                        </svg>
                    </div>
                    <input id="locations-search"
                           type="search"
                           placeholder="Search locations…"
                           class="pl-9 pr-4 py-2 w-72 bg-white border border-slate-200 rounded-xl text-sm text-slate-700 placeholder-slate-400 focus:outline-none focus:border-orange-500 focus:ring-2 focus:ring-orange-500/20 transition-all">
                </div>

                <!-- Show N entries -->
                <div class="flex items-center gap-2 text-sm text-slate-500">
                    <span>Show</span>
                    <select id="locations-length"
                            class="w-16 border border-slate-200 rounded-lg px-2 py-1.5 text-slate-700 text-sm focus:outline-none focus:border-orange-500 focus:ring-2 focus:ring-orange-500/20 bg-white">
                        <option value="10">10</option>
                        <option value="25">25</option>
                        <option value="50">50</option>
                        <option value="100">100</option>
                    </select>
                    <span>entries</span>
                </div>
            </div>

            <!-- Table -->
            <div class="overflow-x-auto">
                <table id="locations-table" class="w-full">
                    <thead>
                        <tr class="bg-slate-50 text-slate-400 uppercase text-[11px] font-bold tracking-widest">
                            <th class="px-6 py-3.5 text-left border-b border-slate-100 w-20">Sr. No.</th>
                            <th class="px-6 py-3.5 text-left border-b border-slate-100">Location Name</th>
                            <?php if (\Illuminate\Support\Facades\Blade::check('role', 'Super Admin')): ?>
                            <th class="px-6 py-3.5 text-right border-b border-slate-100 w-32">Actions</th>
                            <?php endif; ?>
                        </tr>
                    </thead>
                    <tbody class="text-slate-600 divide-y divide-slate-50">
                        <!-- DataTables will populate this -->
                    </tbody>
                </table>
            </div>

            <!-- Card Bottom Bar: Info + Pagination -->
            <div class="flex flex-col sm:flex-row sm:items-center justify-between gap-3 px-6 py-4 border-t border-slate-100 bg-slate-50/40">
                <div id="locations-info" class="text-sm text-slate-400"></div>
                <div id="locations-pagination"></div>
            </div>
        </div>
    </div>

    <?php $__env->startPush('styles'); ?>
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.7/css/jquery.dataTables.min.css">
    <style>
        /* Strip ALL default DataTables chrome — we use our own */
        .dataTables_wrapper .dataTables_filter,
        .dataTables_wrapper .dataTables_length,
        .dataTables_wrapper .dataTables_info,
        .dataTables_wrapper .dataTables_paginate { display: none !important; }

        /* Table rows */
        table.dataTable.no-footer { border-bottom: none !important; }
        table.dataTable thead th  { border-bottom: none !important; }
        table.dataTable tbody tr  { background: transparent !important; transition: background 0.15s; }
        table.dataTable tbody tr:hover { background: #fafafa !important; }
        table.dataTable tbody td  { padding: 1rem 1.5rem !important; border-bottom: 1px solid #f8fafc !important; vertical-align: middle; }

        /* Custom pagination (rendered into #locations-pagination) */
        #locations-pagination .pagination {
            display: flex; gap: 4px; list-style: none; margin: 0; padding: 0;
        }
        #locations-pagination .page-item .page-link {
            display: inline-flex; align-items: center; justify-content: center;
            min-width: 32px; height: 32px; padding: 0 8px;
            border-radius: 8px; font-size: 13px; font-weight: 600;
            color: #64748b; background: #fff; border: 1px solid #e2e8f0;
            cursor: pointer; transition: all 0.15s;
        }
        #locations-pagination .page-item.active .page-link,
        #locations-pagination .page-item .page-link:hover:not([disabled]) {
            background: #ea580c; color: #fff; border-color: #ea580c;
        }
        #locations-pagination .page-item.disabled .page-link {
            opacity: 0.35; cursor: not-allowed;
        }
    </style>
    <?php $__env->stopPush(); ?>

    <?php $__env->startPush('scripts'); ?>
    <script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
    <script src="https://cdn.datatables.net/1.13.7/js/jquery.dataTables.min.js"></script>
    <script>
    $(document).ready(function () {
        var isSuperAdmin = <?php echo e(auth()->user()->hasRole('Super Admin') ? 'true' : 'false'); ?>;

        var columns = [
            { data: 'DT_RowIndex', name: 'DT_RowIndex', orderable: false, searchable: false },
            { data: 'name',        name: 'name' },
        ];

        if (isSuperAdmin) {
            columns.push({
                data: 'action', name: 'action',
                orderable: false, searchable: false,
                className: 'text-right'
            });
        }

        var table = $('#locations-table').DataTable({
            processing : true,
            serverSide : true,
            dom        : 'rt',   // Only render the processing indicator + table; everything else is custom
            ajax       : "<?php echo e(route('locations.index')); ?>",
            columns    : columns,
            pageLength : 10,
            language   : { processing: '<div class="py-8 text-center text-sm text-slate-400">Loading…</div>' },
            drawCallback: function (settings) {
                // ── Info ──────────────────────────────────────────
                var api   = this.api();
                var start = api.page.info().start + 1;
                var end   = api.page.info().end;
                var total = api.page.info().recordsFiltered;
                $('#locations-info').text(
                    total === 0
                        ? 'No entries found'
                        : 'Showing ' + start + '–' + end + ' of ' + total + ' entries'
                );

                // ── Pagination ────────────────────────────────────
                var info      = api.page.info();
                var pageCount = info.pages;
                var current   = info.page;   // 0-indexed

                if (pageCount <= 1) { $('#locations-pagination').html(''); return; }

                var html = '<ul class="pagination">';

                // Prev
                html += '<li class="page-item' + (current === 0 ? ' disabled' : '') + '">'
                      + '<span class="page-link" ' + (current > 0 ? 'onclick="locPage(' + (current - 1) + ')"' : '') + '>‹</span></li>';

                // Page numbers (window of 5)
                var from = Math.max(0, current - 2);
                var to   = Math.min(pageCount - 1, from + 4);
                from     = Math.max(0, to - 4);

                for (var i = from; i <= to; i++) {
                    html += '<li class="page-item' + (i === current ? ' active' : '') + '">'
                          + '<span class="page-link" onclick="locPage(' + i + ')">' + (i + 1) + '</span></li>';
                }

                // Next
                html += '<li class="page-item' + (current >= pageCount - 1 ? ' disabled' : '') + '">'
                      + '<span class="page-link" ' + (current < pageCount - 1 ? 'onclick="locPage(' + (current + 1) + ')"' : '') + '>›</span></li>';

                html += '</ul>';
                $('#locations-pagination').html(html);
            }
        });

        // Expose page jump for pagination buttons
        window.locPage = function (n) { table.page(n).draw(false); };

        // Wire up our custom search input
        var searchTimer;
        $('#locations-search').on('input', function () {
            clearTimeout(searchTimer);
            var val = $(this).val();
            searchTimer = setTimeout(function () { table.search(val).draw(); }, 350);
        });

        // Wire up our custom length select
        $('#locations-length').on('change', function () {
            table.page.len(parseInt($(this).val())).draw();
        });
    });
    </script>
    <?php $__env->stopPush(); ?>
 <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal9ac128a9029c0e4701924bd2d73d7f54)): ?>
<?php $attributes = $__attributesOriginal9ac128a9029c0e4701924bd2d73d7f54; ?>
<?php unset($__attributesOriginal9ac128a9029c0e4701924bd2d73d7f54); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal9ac128a9029c0e4701924bd2d73d7f54)): ?>
<?php $component = $__componentOriginal9ac128a9029c0e4701924bd2d73d7f54; ?>
<?php unset($__componentOriginal9ac128a9029c0e4701924bd2d73d7f54); ?>
<?php endif; ?><?php /**PATH /home/casanovasheaven/public_html/coastguard/resources/views/locations/index.blade.php ENDPATH**/ ?>