<?php $__env->startSection('title', 'About'); ?>

<?php $__env->startSection('content'); ?>
<div class="text-center mb-5">
    <h1 class="text-4xl md:text-5xl font-bold text-gray-900 dark:text-white">About RoomieMatch</h1>
    <p class="mt-4 text-lg text-gray-600 dark:text-gray-300">We help students find the perfect roommate and affordable housing options quickly and safely.</p>
</div>

<div class="row align-items-center">
    <div class="col-md-6 mb-3">
        <img src="<?php echo e(asset('images/about.jpg')); ?>" alt="About RoomieMatch" class="img-fluid rounded shadow-sm">
    </div>
    <div class="col-md-6">
        <p class="text-lg text-gray-800 dark:text-gray-200 leading-relaxed">RoomieMatch allows students to create profiles, set their preferences, and connect with compatible roommates. Say goodbye to random Facebook posts or Craigslist ads!</p>
        <p class="text-lg text-gray-800 dark:text-gray-200 leading-relaxed">Students can filter roommates based on lifestyle preferences, budget, and study habits, ensuring a harmonious living environment.</p>
    </div>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.public', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\Users\jjsr1\OneDrive\Desktop\4. PHP\roomiematch\resources\views/about.blade.php ENDPATH**/ ?>