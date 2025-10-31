

<?php $__env->startSection('content'); ?>
<div class="max-w-7xl mx-auto p-6 space-y-8">

    
    <?php if(session('success')): ?>
        <div class="bg-green-600 text-white px-4 py-2 rounded">
            <?php echo e(session('success')); ?>

        </div>
    <?php endif; ?>

    
    <div>
        <h1 class="text-3xl font-bold text-indigo-400 mb-2">Admin Dashboard</h1>
        <p class="text-gray-400">Welcome back, <?php echo e(Auth::user()->name); ?>.</p>
    </div>

    
    <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
        <div class="bg-gray-800 p-5 rounded-lg shadow text-center">
            <h3 class="text-gray-400 text-sm uppercase">Total Users</h3>
            <p class="text-2xl font-bold text-white mt-2"><?php echo e($totalUsers); ?></p>
        </div>

        <div class="bg-gray-800 p-5 rounded-lg shadow text-center">
            <h3 class="text-gray-400 text-sm uppercase">Total Listings</h3>
            <p class="text-2xl font-bold text-white mt-2"><?php echo e($totalListings); ?></p>
        </div>

        <div class="bg-gray-800 p-5 rounded-lg shadow text-center">
            <h3 class="text-gray-400 text-sm uppercase">Recent Signups</h3>
            <ul class="text-sm mt-2 text-gray-300">
                <?php $__empty_1 = true; $__currentLoopData = $recentUsers; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $user): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                    <li><?php echo e($user->name); ?> – <?php echo e($user->created_at->format('M d, Y')); ?></li>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                    <li>No new users</li>
                <?php endif; ?>
            </ul>
        </div>
    </div>

    
    <div class="bg-gray-800 p-6 rounded-lg shadow">
        <h2 class="text-xl font-semibold text-gray-200 mb-4">User Accounts</h2>

        <div class="overflow-x-auto">
            <table class="min-w-full divide-y divide-gray-700">
                <thead>
                    <tr class="text-left text-gray-400 uppercase text-sm">
                        <th class="py-3 px-4">Name</th>
                        <th class="py-3 px-4">Email</th>
                        <th class="py-3 px-4">Role</th>
                        <th class="py-3 px-4">Joined</th>
                        <th class="py-3 px-4 text-center">Actions</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-gray-700">
                    <?php $__currentLoopData = $users; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $user): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <tr class="text-gray-300 hover:bg-gray-700 transition">
                            <td class="py-3 px-4"><?php echo e($user->name); ?></td>
                            <td class="py-3 px-4"><?php echo e($user->email); ?></td>
                            <td class="py-3 px-4">
                                <form method="POST" action="<?php echo e(route('admin.update-role', $user->id)); ?>">
                                    <?php echo csrf_field(); ?>
                                    <?php echo method_field('PATCH'); ?>
                                    <select name="role" onchange="this.form.submit()" class="bg-gray-900 border border-gray-700 rounded text-gray-300 text-sm px-2 py-1">
                                        <option value="user" <?php echo e($user->role === 'user' ? 'selected' : ''); ?>>User</option>
                                        <option value="admin" <?php echo e($user->role === 'admin' ? 'selected' : ''); ?>>Admin</option>
                                    </select>
                                </form>
                            </td>
                            <td class="py-3 px-4"><?php echo e($user->created_at->format('M d, Y')); ?></td>
                            <td class="py-3 px-4 text-center space-x-2">
                                <form method="POST" action="<?php echo e(route('admin.reset-password', $user->id)); ?>" class="inline-block">
                                    <?php echo csrf_field(); ?>
                                    <button class="text-indigo-400 hover:text-indigo-200 text-sm font-medium">Reset Password</button>
                                </form>

                                <form method="POST" action="<?php echo e(route('admin.delete-user', $user->id)); ?>" class="inline-block">
                                    <?php echo csrf_field(); ?>
                                    <?php echo method_field('DELETE'); ?>
                                    <button class="text-red-500 hover:text-red-300 text-sm font-medium">Delete</button>
                                </form>
                            </td>
                        </tr>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </tbody>
            </table>
        </div>
    </div>

    
    <div class="bg-gray-800 p-6 rounded-lg shadow">
        <h2 class="text-xl font-semibold text-gray-200 mb-4">Activity Log</h2>
        <ul class="text-gray-300 text-sm space-y-2">
            <li>🕒 User Scarlett Jet registered - Oct 20, 2025</li>
            <li>🕒 Admin reset password for Rajkamal Singh</li>
            <li>🕒 Joe Appiah updated his profile</li>
        </ul>
        <p class="text-gray-500 text-sm mt-2">(*Static sample — you can link this to real logs later using Laravel’s events or database.)</p>
    </div>

</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\Users\jjsr1\OneDrive\Desktop\4. PHP\roomiematch\resources\views/admin/dashboard.blade.php ENDPATH**/ ?>