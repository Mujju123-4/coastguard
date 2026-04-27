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
        <div class="mb-6">
            <h2 class="text-2xl font-semibold text-slate-800">Edit User: <?php echo e($user->name); ?></h2>
        </div>

        <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg p-6">
            <form id="edit-user-form" action="<?php echo e(route('users.update', $user->id)); ?>" method="POST">
                <?php echo csrf_field(); ?>
                <?php echo method_field('PUT'); ?>
                <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mb-4">
                    <div>
                        <label for="name" class="block text-sm font-medium text-slate-700">Name</label>
                        <input type="text" name="name" id="name" value="<?php echo e(old('name', $user->name)); ?>"
                            class="mt-1 block w-full border-slate-300 rounded-md shadow-sm focus:ring-orange-500 focus:border-orange-500">
                        <p id="error-name" class="text-red-600 text-xs mt-1 hidden"></p>
                    </div>
                    <div>
                        <label for="email" class="block text-sm font-medium text-slate-700">User Id</label>
                        <input type="text" name="email" id="email" value="<?php echo e(old('email', $user->email)); ?>"
                            class="mt-1 block w-full border-slate-300 rounded-md shadow-sm focus:ring-orange-500 focus:border-orange-500">
                        <p id="error-email" class="text-red-600 text-xs mt-1 hidden"></p>
                    </div>
                </div>

                <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mb-4">
                    <div>
                        <label for="password" class="block text-sm font-medium text-slate-700">Password (leave blank to
                            keep current)</label>
                        <div class="relative mt-1">
                            <input type="password" name="password" id="password"
                                class="block w-full border-slate-300 rounded-md shadow-sm focus:ring-orange-500 focus:border-orange-500 pr-10">
                            
                        </div>
                        <p id="error-password" class="text-red-600 text-xs mt-1 hidden"></p>
                    </div>
                    <div>
                        <label for="password_confirmation" class="block text-sm font-medium text-slate-700">Confirm
                            Password</label>
                        <div class="relative mt-1">
                            <input type="password" name="password_confirmation" id="password_confirmation"
                                class="block w-full border-slate-300 rounded-md shadow-sm focus:ring-orange-500 focus:border-orange-500 pr-10">
                            
                        </div>
                    </div>
                </div>

                <div class="mb-6">
                    <label for="location_id" class="block text-sm font-medium text-slate-700">Location</label>
                    <select name="location_id" id="location_id"
                        class="mt-1 block w-full border-slate-300 rounded-md shadow-sm focus:ring-orange-500 focus:border-orange-500">
                        <option value="">Select a location</option>
                        <?php $__currentLoopData = $locations; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $location): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <option value="<?php echo e($location->id); ?>"
                                <?php echo e(old('location_id', $user->location_id) == $location->id ? 'selected' : ''); ?>>
                                <?php echo e($location->name); ?>

                            </option>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </select>
                    <p id="error-location_id" class="text-red-600 text-xs mt-1 hidden"></p>
                </div>

                <div class="mb-6">
                    <label for="role" class="block text-sm font-medium text-slate-700 mb-2">Assign Role</label>
                    <select name="role" id="role"
                        class="mt-1 block w-full border-slate-300 rounded-md shadow-sm focus:ring-orange-500 focus:border-orange-500"
                        onchange="showPermissions(this)">
                        <option value="">Select a role</option>
                        <?php $__currentLoopData = $roles; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $role): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <option value="<?php echo e($role->name); ?>"
                                data-permissions="<?php echo e($role->permissions->pluck('name')->implode(', ')); ?>"
                                <?php echo e(old('role', $userRole) == $role->name ? 'selected' : ''); ?>><?php echo e($role->name); ?>

                            </option>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </select>
                    <p id="error-role" class="text-red-600 text-xs mt-1 hidden"></p>
                </div>

                <div id="permissions-display" class="mb-6 hidden">
                    <label class="block text-sm font-medium text-slate-700 mb-2">Role Permissions:</label>
                    <div id="permissions-list" class="flex flex-wrap gap-2">
                        <!-- Permissions will be added here by JS -->
                    </div>
                </div>

                <script>
                    function togglePasswordVisibility(inputId) {
                        const input = document.getElementById(inputId);
                        const eye = document.getElementById('eye-' + inputId);
                        const eyeOff = document.getElementById('eye-off-' + inputId);

                        if (input.type === 'password') {
                            input.type = 'text';
                            eye.classList.add('hidden');
                            eyeOff.classList.remove('hidden');
                        } else {
                            input.type = 'password';
                            eye.classList.remove('hidden');
                            eyeOff.classList.add('hidden');
                        }
                    }

                    function showPermissions(select) {
                        const display = document.getElementById('permissions-display');
                        const list = document.getElementById('permissions-list');
                        const option = select.options[select.selectedIndex];
                        const permissions = option.getAttribute('data-permissions');

                        if (permissions) {
                            display.classList.remove('hidden');
                            list.innerHTML = permissions.split(', ').map(p =>
                                `<span class="px-2 py-1 text-xs font-semibold rounded-full bg-slate-100 text-slate-700 border border-slate-200">${p}</span>`
                            ).join('');
                        } else {
                            display.classList.add('hidden');
                            list.innerHTML = '';
                        }
                    }

                    document.getElementById('edit-user-form').addEventListener('submit', function(e) {
                        e.preventDefault();
                        const form = this;
                        const formData = new FormData(form);
                        const submitBtn = form.querySelector('button[type="submit"]');

                        submitBtn.disabled = true;
                        submitBtn.innerHTML = 'Updating...';

                        document.querySelectorAll('[id^="error-"]').forEach(el => el.classList.add('hidden'));

                        fetch(form.action, {
                                method: 'POST',
                                body: formData,
                                headers: {
                                    'X-Requested-With': 'XMLHttpRequest',
                                    'Accept': 'application/json'
                                }
                            })
                            .then(response => response.json().then(data => ({
                                status: response.status,
                                body: data
                            })))
                            .then(res => {
                                if (res.status === 200 && res.body.success) {
                                    window.location.href = res.body.redirect;
                                } else if (res.status === 422) {
                                    for (const [key, messages] of Object.entries(res.body.errors)) {
                                        const errorEl = document.getElementById(`error-${key}`);
                                        if (errorEl) {
                                            errorEl.textContent = messages[0];
                                            errorEl.classList.remove('hidden');
                                        }
                                    }
                                    submitBtn.disabled = false;
                                    submitBtn.innerHTML = 'Update User';
                                } else {
                                    alert(res.body.message || 'Something went wrong.');
                                    submitBtn.disabled = false;
                                    submitBtn.innerHTML = 'Update User';
                                }
                            })
                            .catch(err => {
                                console.error(err);
                                alert('An error occurred. Please try again.');
                                submitBtn.disabled = false;
                                submitBtn.innerHTML = 'Update User';
                            });
                    });

                    window.onload = function() {
                        const select = document.getElementById('role');
                        if (select.value) showPermissions(select);
                    }
                </script>

                <div class="flex justify-end">
                    <a href="<?php echo e(route('users.index')); ?>"
                        class="bg-slate-500 hover:bg-slate-600 text-white font-bold py-2 px-4 rounded transition-colors mr-2">Cancel</a>
                    <button type="submit"
                        class="bg-orange-600 hover:bg-orange-700 text-white font-bold py-2 px-4 rounded transition-colors">Update
                        User</button>
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
<?php /**PATH /home/casanovasheaven/public_html/coastguard/resources/views/users/edit.blade.php ENDPATH**/ ?>