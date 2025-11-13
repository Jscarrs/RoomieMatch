

<?php $__env->startSection('content'); ?>
<section class="bg-gray-900 text-gray-100 min-h-screen">
    <div class="max-w-3xl mx-auto px-6 py-10">
        <div class="bg-gray-800 rounded-2xl shadow-lg p-8">
            <h1 class="text-2xl font-bold text-center mb-6">Create a New Listing</h1>

            <?php if($errors->any()): ?>
                <div class="mb-4 bg-red-500/10 text-red-400 p-4 rounded-lg border border-red-500/20">
                    <ul class="list-disc pl-6 text-sm">
                        <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <li><?php echo e($error); ?></li>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </ul>
                </div>
            <?php endif; ?>

            <!-- Added enctype for image uploads -->
            <form method="POST" action="<?php echo e(route('listings.store')); ?>" enctype="multipart/form-data" class="space-y-6">
                <?php echo csrf_field(); ?>

                <!-- Title -->
                <div>
                    <label class="block text-sm font-medium mb-1">Title</label>
                    <input type="text" name="title" value="<?php echo e(old('title')); ?>"
                           class="w-full px-4 py-2 rounded-lg bg-gray-700 border border-gray-600 
                                  focus:ring-2 focus:ring-emerald-500 focus:outline-none text-gray-100"
                           placeholder="Spacious 2 Bedroom Apartment near Humber College" required>
                </div>

                <!-- Address -->
                <div>
                    <label class="block text-sm font-medium mb-1">Address</label>
                    <input type="text" name="address" value="<?php echo e(old('address')); ?>"
                           class="w-full px-4 py-2 rounded-lg bg-gray-700 border border-gray-600 
                                  focus:ring-2 focus:ring-emerald-500 focus:outline-none text-gray-100"
                           placeholder="123 Main Street, Toronto, ON" required>
                </div>

                <!-- Price -->
                <div>
                    <label class="block text-sm font-medium mb-1">Price (per month)</label>
                    <input type="number" name="price" value="<?php echo e(old('price')); ?>"
                           class="w-full px-4 py-2 rounded-lg bg-gray-700 border border-gray-600 
                                  focus:ring-2 focus:ring-emerald-500 focus:outline-none text-gray-100"
                           placeholder="1350" required>
                </div>

                <!-- Lease Type -->
                <div>
                    <label class="block text-sm font-medium mb-1">Lease Type</label>
                    <select name="lease_type"
                        class="w-full px-4 py-2 rounded-lg bg-gray-700 border border-gray-600 text-gray-100 
                               focus:ring-2 focus:ring-emerald-500 focus:outline-none"
                        required>
                        <option value="">Select Lease Type</option>
                        <option value="4-month">4 Months</option>
                        <option value="8-month">8 Months</option>
                        <option value="1-year">1 Year</option>
                    </select>
                </div>

                <!-- Property Type -->
                <div>
                    <label class="block text-sm font-medium mb-1">Property Type</label>
                    <select name="property_type"
                            class="w-full px-4 py-2 rounded-lg bg-gray-700 border border-gray-600 text-gray-100 
                                   focus:ring-2 focus:ring-emerald-500 focus:outline-none"
                            required>
                        <option value="">Select Property Type</option>
                        <option value="Apartment">Apartment</option>
                        <option value="House">House</option>
                    </select>
                </div>

                <!-- Number of Bathrooms -->
                <div>
                    <label class="block text-sm font-medium mb-1">Number of Bathrooms</label>
                    <input type="number" name="bathrooms" value="<?php echo e(old('bathrooms')); ?>"
                          class="w-full px-4 py-2 rounded-lg bg-gray-700 border border-gray-600 text-gray-100 
                                 focus:ring-2 focus:ring-emerald-500 focus:outline-none"
                          placeholder="e.g., 2"
                          min="1" step="0.5" required>
                </div>
                
                <!-- Checkboxes -->
                <div class="flex flex-wrap gap-4">
                    <label class="flex items-center space-x-2">
                        <input type="checkbox" name="ensuite_washroom" class="accent-emerald-500">
                        <span>Ensuite Washroom</span>
                    </label>

                    <label class="flex items-center space-x-2">
                        <input type="checkbox" name="pet_friendly" class="accent-emerald-500">
                        <span>Pet Friendly</span>
                    </label>
                </div>

                <!-- Description -->
                <div>
                    <label class="block text-sm font-medium mb-1">Description</label>
                    <textarea name="description" rows="4"
                              class="w-full px-4 py-2 rounded-lg bg-gray-700 border border-gray-600 
                                     focus:ring-2 focus:ring-emerald-500 focus:outline-none text-gray-100"
                              placeholder="Describe the space, nearby transit, roommates, etc."><?php echo e(old('description')); ?></textarea>
                </div>

                <!-- Photo Upload -->
                <div>
                    <label class="block text-sm font-medium mb-1">Upload Photo</label>
                    <input type="file" name="photo"
                           class="w-full text-gray-100 bg-gray-700 border border-gray-600 rounded-lg cursor-pointer 
                                  focus:ring-2 focus:ring-emerald-500 focus:outline-none"
                           accept="image/*">
                    <p class="text-xs text-gray-400 mt-1">Supported formats: JPG, PNG, GIF (Max: 2MB)</p>
                </div>

                <!-- Submit -->
                <div class="text-center">
                    <button type="submit"
                            class="px-6 py-2 bg-emerald-600 text-white font-semibold rounded-lg 
                                   hover:bg-emerald-700 focus:ring-2 focus:ring-emerald-500 transition">
                        Publish Listing
                    </button>
                </div>
            </form>
        </div>
    </div>
</section>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\Users\jjsr1\OneDrive\Desktop\4. PHP\roomiematch\resources\views/listings/create.blade.php ENDPATH**/ ?>