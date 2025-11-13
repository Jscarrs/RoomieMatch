

<?php $__env->startSection('content'); ?>
<section class="bg-gray-900 text-gray-100 min-h-screen py-10">
    <div class="max-w-5xl mx-auto px-6">
        <div class="bg-gray-800 rounded-2xl shadow-lg p-8 flex flex-col md:flex-row gap-8">

            <!-- Listing Image -->
            <div class="md:w-1/2">
                <?php if($listing->photos && count(json_decode($listing->photos, true)) > 0): ?>
                    <img src="<?php echo e(asset('storage/' . json_decode($listing->photos, true)[0])); ?>"
                         alt="Listing Photo"
                         class="rounded-lg w-full h-80 object-cover">
                <?php else: ?>
                    <div class="w-full h-80 bg-gray-700 rounded-lg flex items-center justify-center">
                        <span class="text-gray-400">No image uploaded</span>
                    </div>
                <?php endif; ?>
            </div>

            <!-- Listing Info -->
            <div class="md:w-1/2 flex flex-col justify-between">
                <div>
                    <h1 class="text-3xl font-bold mb-2"><?php echo e($listing->title); ?></h1>
                    <p class="text-gray-400 mb-4"><?php echo e($listing->address); ?></p>

                    <p class="text-emerald-400 font-bold text-2xl mb-2">
                        $<?php echo e(number_format($listing->price)); ?> <span class="text-sm text-gray-400">/month</span>
                    </p>

                    <div class="flex flex-wrap gap-2 mb-4">
                        <?php if($listing->lease_type): ?>
                            <span class="bg-gray-700 px-3 py-1 rounded-full text-xs"><?php echo e($listing->lease_type); ?></span>
                        <?php endif; ?>
                        <?php if($listing->property_type): ?>
                            <span class="bg-gray-700 px-3 py-1 rounded-full text-xs"><?php echo e($listing->property_type); ?></span>
                        <?php endif; ?>
                        <?php if($listing->ensuite_washroom): ?>
                            <span class="bg-gray-700 px-3 py-1 rounded-full text-xs">Ensuite</span>
                        <?php endif; ?>
                        <?php if($listing->pet_friendly): ?>
                            <span class="bg-gray-700 px-3 py-1 rounded-full text-xs">Pet Friendly</span>
                        <?php endif; ?>
                        <?php if($listing->gender_preference): ?>
                            <span class="bg-gray-700 px-3 py-1 rounded-full text-xs">
                                <?php echo e($listing->gender_preference); ?>

                            </span>
                        <?php endif; ?>
                    </div>

                    <!-- ✅ Gender Preference (detailed line view) -->
                    <p class="text-gray-300 mb-4">
                        <strong>Gender Preference:</strong>
                        <?php echo e($listing->gender_preference ?? 'Not specified'); ?>

                    </p>

                    <h2 class="text-lg font-semibold mb-1">Description</h2>
                    <p class="text-gray-300 mb-6">
                        <?php echo e($listing->description ?? 'No description provided.'); ?>

                    </p>

                    <p class="text-sm text-gray-500">
                        Listed by: 
                        <span class="text-gray-300 font-medium">
                            <?php echo e($listing->user->name ?? 'Unknown User'); ?>

                        </span>
                    </p>
                </div>

                <div class="flex gap-4 mt-6">
                    <a href="#" class="px-4 py-2 bg-emerald-600 text-white rounded-lg hover:bg-emerald-700 transition">
                        Contact Owner
                    </a>
                    <a href="#" class="px-4 py-2 bg-gray-700 text-gray-200 rounded-lg hover:bg-gray-600 transition">
                        Add to Favourites
                    </a>
                </div>
            </div>
        </div>

        <div class="mt-8">
            <a href="<?php echo e(route('listings.index')); ?>" class="text-emerald-400 hover:underline">
                ← Back to Listings
            </a>
        </div>
    </div>
</section>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\Users\jjsr1\OneDrive\Desktop\4. PHP\roomiematch\resources\views/listings/show.blade.php ENDPATH**/ ?>