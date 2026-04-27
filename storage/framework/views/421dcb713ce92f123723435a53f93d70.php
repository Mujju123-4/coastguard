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
    <div class="max-w-7xl mx-auto py-10 sm:px-6 lg:px-8">
        <div class="mb-6 flex justify-between items-center">
            <div>
                <h2 class="text-2xl font-semibold text-slate-800">User Manuals</h2>
                <p class="text-slate-500 text-sm mt-1">Manage system documentation and guides</p>
            </div>
            <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('upload manual')): ?>
            <a href="<?php echo e(route('user-manuals.create')); ?>" class="bg-indigo-600 hover:bg-indigo-700 text-white font-bold py-2.5 px-5 rounded-lg transition-all duration-200 shadow-md hover:shadow-lg flex items-center">
                <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4" /></svg>
                Upload New Manual
            </a>
            <?php endif; ?>
        </div>

        <?php if(session('success')): ?>
            <div class="mb-6 p-4 bg-emerald-50 border-l-4 border-emerald-400 text-emerald-700">
                <div class="flex">
                    <div class="flex-shrink-0">
                        <svg class="h-5 w-5 text-emerald-400" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd" /></svg>
                    </div>
                    <div class="ml-3">
                        <p class="text-sm font-medium"><?php echo e(session('success')); ?></p>
                    </div>
                </div>
            </div>
        <?php endif; ?>

        <?php
            $manualsForCards = \App\Models\UserManual::latest()->get();
        ?>

        <!-- Visual Card List -->
        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6 mb-10">
            <?php $__currentLoopData = $manualsForCards; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $manual): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <div class="bg-white rounded-xl shadow-sm border border-slate-200 overflow-hidden group hover:shadow-md transition-all duration-300">
                    <div class="p-5">
                        <div class="flex items-start justify-between mb-4">
                            <div class="p-3 bg-rose-50 rounded-lg group-hover:bg-rose-100 transition-colors">
                                <svg class="w-8 h-8 text-rose-500" fill="currentColor" viewBox="0 0 20 20">
                                    <path d="M9 2a2 2 0 00-2 2v8a2 2 0 002 2h6a2 2 0 002-2V6.414A2 2 0 0016.414 5L14 2.586A2 2 0 0012.586 2H9z" />
                                    <path d="M3 8a2 2 0 012-2v10h8a2 2 0 01-2 2H5a2 2 0 01-2-2V8z" />
                                </svg>
                            </div>
                            <div class="flex space-x-2">
                                <a href="<?php echo e(route('user-manuals.view', $manual->id)); ?>" target="_blank" class="p-2 text-slate-400 hover:text-indigo-600 hover:bg-indigo-50 rounded-full transition-all" title="View PDF">
                                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" /><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z" /></svg>
                                </a>
                                <!--<a href="<?php echo e(route('user-manuals.download', $manual->id)); ?>" class="p-2 text-slate-400 hover:text-emerald-600 hover:bg-emerald-50 rounded-full transition-all" title="Download">-->
                                <!--    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16v1a3 3 0 003 3h10a3 3 0 003-3v-1m-4-4l-4 4m0 0l-4-4m4 4V4" /></svg>-->
                                <!--</a>-->
                                <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('delete manual')): ?>
                                <form action="<?php echo e(route('user-manuals.destroy', $manual->id)); ?>" method="POST" class="inline" onsubmit="return confirm('Are you sure you want to delete this manual?')">
                                    <?php echo csrf_field(); ?>
                                    <?php echo method_field('DELETE'); ?>
                                    <button type="submit" class="p-2 text-slate-400 hover:text-rose-600 hover:bg-rose-50 rounded-full transition-all" title="Delete">
                                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" /></svg>
                                    </button>
                                </form>
                                <?php endif; ?>
                            </div>
                        </div>
                        <h3 class="text-lg font-bold text-slate-800 mb-1 truncate" title="<?php echo e($manual->title); ?>"><?php echo e($manual->title); ?></h3>
                        <p class="text-xs text-slate-400 mb-4 flex items-center">
                            <svg class="w-3 h-3 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z" /></svg>
                            Uploaded on <?php echo e($manual->created_at->format('M d, Y')); ?>

                        </p>
                        <a href="<?php echo e(route('user-manuals.download', $manual->id)); ?>" class="w-full inline-flex items-center justify-center px-4 py-2 bg-slate-800 text-white text-sm font-semibold rounded-lg hover:bg-slate-900 transition-colors">
                            Download Now
                        </a>
                    </div>
                </div>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </div>

        <!--<div class="mb-4">-->
        <!--    <h3 class="text-lg font-semibold text-slate-700">All Manuals</h3>-->
        <!--</div>-->

        <!--<div class="bg-white overflow-hidden shadow-sm sm:rounded-xl border border-slate-200">-->
        <!--    <div class="p-6">-->
        <!--        <table id="manuals-table" class="w-full text-left border-collapse">-->
        <!--            <thead>-->
        <!--                <tr class="text-slate-400 text-xs uppercase tracking-wider border-b border-slate-100">-->
        <!--                    <th class="pb-4 font-semibold">#</th>-->
        <!--                    <th class="pb-4 font-semibold">Title</th>-->
        <!--                    <th class="pb-4 font-semibold">Upload Date</th>-->
        <!--                    <th class="pb-4 font-semibold text-right">Actions</th>-->
        <!--                </tr>-->
        <!--            </thead>-->
        <!--            <tbody class="text-slate-600 text-sm">-->
                        <!-- DataTables will populate this -->
        <!--            </tbody>-->
        <!--        </table>-->
        <!--    </div>-->
        <!--</div>-->
    </div>

    <?php $__env->startPush('scripts'); ?>
    <script>
        $(document).ready(function() {
            $('#manuals-table').DataTable({
                processing: true,
                serverSide: true,
                ajax: "<?php echo e(route('user-manuals.index')); ?>",
                columns: [
                    { data: 'DT_RowIndex', name: 'DT_RowIndex', orderable: false, searchable: false },
                    { 
                        data: 'title', 
                        name: 'title',
                        render: function(data, type, row) {
                            return '<div class="flex items-center"><svg class="w-5 h-5 mr-3 text-rose-500" fill="currentColor" viewBox="0 0 20 20"><path d="M9 2a2 2 0 00-2 2v8a2 2 0 002 2h6a2 2 0 002-2V6.414A2 2 0 0016.414 5L14 2.586A2 2 0 0012.586 2H9z" /><path d="M3 8a2 2 0 012-2v10h8a2 2 0 01-2 2H5a2 2 0 01-2-2V8z" /></svg><span class="font-medium text-slate-700">' + data + '</span></div>';
                        }
                    },
                    { 
                        data: 'created_at', 
                        name: 'created_at',
                        render: function(data) {
                            return new Date(data).toLocaleDateString();
                        }
                    },
                    { data: 'action', name: 'action', orderable: false, searchable: false, className: 'text-right' }
                ],
                language: {
                    search: "_INPUT_",
                    searchPlaceholder: "Search manuals...",
                    lengthMenu: "_MENU_ rows per page",
                },
                dom: '<"flex flex-col md:flex-row md:items-center justify-between gap-4 mb-6"f l>rt<"flex flex-col md:flex-row md:items-center justify-between gap-4 mt-6"i p>',
                drawCallback: function() {
                    $('.dataTables_paginate .paginate_button').addClass('px-3 py-1 mx-1 rounded-md border border-slate-200 hover:bg-slate-50 transition-colors');
                    $('.dataTables_filter input').addClass('border-slate-200 rounded-lg focus:ring-indigo-500 focus:border-indigo-500 min-w-[300px]');
                    $('.dataTables_length select').addClass('border-slate-200 rounded-lg mr-2');
                }
            });
        });
    </script>
    <?php $__env->stopPush(); ?>

    <style>
        .dataTables_wrapper .dataTables_processing {
            background: rgba(255, 255, 255, 0.8);
            color: #4f46e5;
            border: none;
            box-shadow: none;
        }
        .dataTables_filter {
            float: left !important;
        }
        .dataTables_length {
            float: right !important;
            font-size: 0.875rem;
            color: #64748b;
        }
    </style>
 <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal9ac128a9029c0e4701924bd2d73d7f54)): ?>
<?php $attributes = $__attributesOriginal9ac128a9029c0e4701924bd2d73d7f54; ?>
<?php unset($__attributesOriginal9ac128a9029c0e4701924bd2d73d7f54); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal9ac128a9029c0e4701924bd2d73d7f54)): ?>
<?php $component = $__componentOriginal9ac128a9029c0e4701924bd2d73d7f54; ?>
<?php unset($__componentOriginal9ac128a9029c0e4701924bd2d73d7f54); ?>
<?php endif; ?>
<?php /**PATH /home/casanovasheaven/public_html/coastguard/resources/views/user_manuals/index.blade.php ENDPATH**/ ?>