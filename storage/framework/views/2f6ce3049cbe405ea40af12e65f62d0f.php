

<?php $__env->startSection('content'); ?>
<section class="bg-gray-900 text-gray-100 min-h-screen py-10">
    <div class="max-w-3xl mx-auto px-6">

        <h1 class="text-3xl font-bold mb-6 text-white">Create a New Listing</h1>

        <!-- Success Message -->
        <?php if(session('success')): ?>
            <div class="mb-6 p-4 bg-emerald-600/20 text-emerald-400 rounded-lg border border-emerald-600/30">
                <?php echo e(session('success')); ?>

            </div>
        <?php endif; ?>

        <!-- Validation Errors -->
        <?php if($errors->any()): ?>
            <div class="mb-6 p-4 bg-red-600/20 text-red-400 rounded-lg border border-red-600/30">
                <ul class="list-disc list-inside text-sm">
                    <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <li><?php echo e($error); ?></li>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </ul>
            </div>
        <?php endif; ?>

        <!-- Create Listing Form -->
        <form action="<?php echo e(route('listings.store')); ?>" method="POST" enctype="multipart/form-data" class="bg-gray-800 p-8 rounded-2xl shadow-lg border border-gray-700">
            <?php echo csrf_field(); ?>
            <?php echo $__env->make('listings.partials.form', ['listing' => null], array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?>

            <div class="mt-6 flex justify-end gap-4">
                <a href="<?php echo e(route('listings.index')); ?>"
                   class="px-4 py-2 bg-gray-700 text-gray-200 rounded-lg hover:bg-gray-600 transition">
                    Cancel
                </a>
                <button type="submit"
                    class="px-4 py-2 bg-emerald-600 text-white rounded-lg hover:bg-emerald-700 transition">
                    Create Listing
                </button>
            </div>
        </form>
    </div>
</section>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\Users\jjsr1\OneDrive\Desktop\4. PHP\roomiematch\resources\views/listings/create.blade.php ENDPATH**/ ?>