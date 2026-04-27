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
    <div class="max-w-4xl mx-auto py-10 sm:px-6 lg:px-8">
        <div class="mb-6">
            <h2 class="text-2xl font-semibold text-slate-800">Add New Item</h2>
        </div>

        <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg p-6">
            <form action="<?php echo e(route('item-masters.store')); ?>" method="POST">
                <?php echo csrf_field(); ?>
                
                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    <div class="mb-4">
                        <label for="location_id" class="block text-sm font-medium text-slate-700">Location</label>
                        <select name="location_id" id="location_id" required
                            class="mt-1 block w-full border-slate-300 rounded-md shadow-sm focus:ring-orange-500 focus:border-orange-500">
                            <option value="">Select Location</option>
                            <?php $__currentLoopData = $locations; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $location): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <option value="<?php echo e($location->id); ?>" <?php echo e(old('location_id') == $location->id ? 'selected' : ''); ?>>
                                    <?php echo e($location->name); ?>

                                </option>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </select>
                        <?php $__errorArgs = ['location_id'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                            <p class="text-red-600 text-xs mt-1"><?php echo e($message); ?></p>
                        <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                    </div>

                    <div class="mb-4">
                        <label for="code" class="block text-sm font-medium text-slate-700">Code</label>
                        <input type="text" name="code" id="code" value="<?php echo e(old('code')); ?>" required
                            class="mt-1 block w-full border-slate-300 rounded-md shadow-sm focus:ring-orange-500 focus:border-orange-500">
                        <?php $__errorArgs = ['code'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                            <p class="text-red-600 text-xs mt-1"><?php echo e($message); ?></p>
                        <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                    </div>

                    <div class="mb-4">
                        <label for="serial_no" class="block text-sm font-medium text-slate-700">Serial No</label>
                        <input type="text" name="serial_no" id="serial_no" value="<?php echo e(old('serial_no')); ?>"
                            class="mt-1 block w-full border-slate-300 rounded-md shadow-sm focus:ring-orange-500 focus:border-orange-500">
                        <?php $__errorArgs = ['serial_no'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                            <p class="text-red-600 text-xs mt-1"><?php echo e($message); ?></p>
                        <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                    </div>

                    <div class="mb-4">
                        <label for="qty" class="block text-sm font-medium text-slate-700">Quantity</label>
                        <input type="number" name="qty" id="qty" value="<?php echo e(old('qty', 0)); ?>" required min="0"
                            class="mt-1 block w-full border-slate-300 rounded-md shadow-sm focus:ring-orange-500 focus:border-orange-500">
                        <?php $__errorArgs = ['qty'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                            <p class="text-red-600 text-xs mt-1"><?php echo e($message); ?></p>
                        <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                    </div>

                    <div class="mb-4">
                        <label for="uom" class="block text-sm font-medium text-slate-700">UoM</label>
                        <select name="uom" id="uom" required
                            class="mt-1 block w-full border-slate-300 rounded-md shadow-sm focus:ring-orange-500 focus:border-orange-500">
                            <option value="">Select UoM</option>
                            <?php $__currentLoopData = $uoms; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $uom): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <option value="<?php echo e($uom); ?>" <?php echo e(old('uom') == $uom ? 'selected' : ''); ?>>
                                    <?php echo e($uom); ?>

                                </option>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </select>
                        <?php $__errorArgs = ['uom'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                            <p class="text-red-600 text-xs mt-1"><?php echo e($message); ?></p>
                        <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                    </div>

                    <div class="mb-4">
                        <label for="serviced_date" class="block text-sm font-medium text-slate-700">Serviced Date</label>
                        <input type="date" name="serviced_date" id="serviced_date" value="<?php echo e(old('serviced_date')); ?>"
                            class="mt-1 block w-full border-slate-300 rounded-md shadow-sm focus:ring-orange-500 focus:border-orange-500">
                        <?php $__errorArgs = ['serviced_date'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                            <p class="text-red-600 text-xs mt-1"><?php echo e($message); ?></p>
                        <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                    </div>
                </div>

                <div class="mb-4">
                    <label for="equipment" class="block text-sm font-medium text-slate-700">Equipment / Name</label>
                    <textarea name="equipment" id="equipment" rows="3" required
                        class="mt-1 block w-full border-slate-300 rounded-md shadow-sm focus:ring-orange-500 focus:border-orange-500"><?php echo e(old('equipment')); ?></textarea>
                    <?php $__errorArgs = ['equipment'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                        <p class="text-red-600 text-xs mt-1"><?php echo e($message); ?></p>
                    <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                </div>

                <!--<div class="mb-6">-->
                <!--    <label class="block text-sm font-medium text-slate-700 mb-2">Item Status</label>-->
                <!--    <div class="flex items-center space-x-6">-->
                <!--        <label class="inline-flex items-center cursor-pointer">-->
                <!--            <input type="radio" name="status" value="operational" <?php echo e(old('status', 'operational') == 'operational' ? 'checked' : ''); ?>-->
                <!--                class="form-radio text-green-600 focus:ring-green-500 border-slate-300 transition-all hover:border-green-400"-->
                <!--                onclick="toggleReason(false)">-->
                <!--            <span class="ml-2 text-sm font-semibold text-slate-700">Operational</span>-->
                <!--        </label>-->
                <!--        <label class="inline-flex items-center cursor-pointer">-->
                <!--            <input type="radio" name="status" value="non-operational" <?php echo e(old('status') == 'non-operational' ? 'checked' : ''); ?>-->
                <!--                class="form-radio text-rose-600 focus:ring-rose-500 border-slate-300 transition-all hover:border-rose-400"-->
                <!--                onclick="toggleReason(true)">-->
                <!--            <span class="ml-2 text-sm font-semibold text-slate-700">Non-operational</span>-->
                <!--        </label>-->
                <!--    </div>-->
                <!--    <?php $__errorArgs = ['status'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>-->
                <!--        <p class="text-red-600 text-xs mt-1"><?php echo e($message); ?></p>-->
                <!--    <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>-->
                <!--</div>-->

                <div class="mb-4 <?php echo e(old('status') == 'non-operational' ? '' : 'hidden'); ?>" id="reason-container">
                    <label for="status_reason" class="block text-sm font-medium text-slate-700 italic">Reason for Non-operational status</label>
                    <textarea name="status_reason" id="status_reason" rows="2"
                        placeholder="Please explain why the item is non-operational..."
                        class="mt-1 block w-full border-slate-300 rounded-md shadow-sm focus:ring-rose-500 focus:border-rose-500 bg-rose-50/30 text-slate-800 placeholder-slate-400"><?php echo e(old('status_reason')); ?></textarea>
                    <?php $__errorArgs = ['status_reason'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                        <p class="text-red-600 text-xs mt-1"><?php echo e($message); ?></p>
                    <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                </div>

                <script>
                    function toggleReason(show) {
                        const container = document.getElementById('reason-container');
                        const textarea = document.getElementById('status_reason');
                        if (show) {
                            container.classList.remove('hidden');
                            textarea.focus();
                        } else {
                            container.classList.add('hidden');
                        }
                    }
                </script>

                <div class="flex justify-end">
                    <a href="<?php echo e(route('item-masters.index')); ?>" class="bg-slate-500 hover:bg-slate-600 text-white font-bold py-2 px-4 rounded transition-colors mr-2">Cancel</a>
                    <button type="submit" class="bg-orange-600 hover:bg-orange-700 text-white font-bold py-2 px-4 rounded transition-colors">Create Item</button>
                </div>
            </form>
        </div>
    </div>
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
<?php /**PATH /home/casanovasheaven/public_html/coastguard/resources/views/item_masters/create.blade.php ENDPATH**/ ?>