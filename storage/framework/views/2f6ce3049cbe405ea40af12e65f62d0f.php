

<?php $__env->startSection('content'); ?>
<section class="bg-gradient-to-br from-gray-900 to-gray-800 min-h-screen py-12">
    <div class="max-w-3xl mx-auto px-6 sm:px-8 bg-gray-800 rounded-2xl shadow-xl border border-gray-700">
        <h1 class="text-3xl font-bold text-white mb-8 text-center">Create a New Listing</h1>

        <form action="<?php echo e(route('listings.store')); ?>" method="POST" class="space-y-6">
            <?php echo csrf_field(); ?>

            <!-- Title -->
            <div>
                <label for="title" class="block text-sm font-medium text-gray-300 mb-1">Title</label>
                <input type="text" name="title" id="title" required
                    class="w-full bg-gray-900 border border-gray-700 text-gray-100 rounded-lg px-4 py-2 focus:outline-none focus:ring-2 focus:ring-emerald-500 focus:border-transparent placeholder-gray-500"
                    placeholder="Spacious 2 Bedroom Apartment near Humber College">
            </div>

            <!-- Address -->
            <div>
                <label for="address" class="block text-sm font-medium text-gray-300 mb-1">Address</label>
                <input type="text" name="address" id="address" required
                    class="w-full bg-gray-900 border border-gray-700 text-gray-100 rounded-lg px-4 py-2 focus:ring-2 focus:ring-emerald-500 placeholder-gray-500"
                    placeholder="123 Main Street, Toronto, ON">
            </div>

            <!-- Price -->
            <div>
                <label for="price" class="block text-sm font-medium text-gray-300 mb-1">Price (per month)</label>
                <input type="number" name="price" id="price" step="0.01" required
                    class="w-full bg-gray-900 border border-gray-700 text-gray-100 rounded-lg px-4 py-2 focus:ring-2 focus:ring-emerald-500 placeholder-gray-500"
                    placeholder="1350">
            </div>

            <!-- Lease Type -->
            <div>
                <label for="lease_type" class="block text-sm font-medium text-gray-300 mb-1">Lease Type</label>
                <select name="lease_type" id="lease_type"
                    class="w-full bg-gray-900 border border-gray-700 text-gray-100 rounded-lg px-4 py-2 focus:ring-2 focus:ring-emerald-500 focus:border-transparent">
                    <option value="">Select Lease Type</option>
                    <option value="Month-to-Month">Month-to-Month</option>
                    <option value="4 Month Sublet">4-Month Sublet</option>
                    <option value="8 Month Lease">8-Month Lease</option>
                    <option value="12 Month Lease">12-Month Lease</option>
                </select>
            </div>

            <!-- Property Type -->
            <div>
                <label for="property_type" class="block text-sm font-medium text-gray-300 mb-1">Property Type</label>
                <select name="property_type" id="property_type"
                    class="w-full bg-gray-900 border border-gray-700 text-gray-100 rounded-lg px-4 py-2 focus:ring-2 focus:ring-emerald-500 focus:border-transparent">
                    <option value="">Select Property Type</option>
                    <option value="Apartment">Apartment</option>
                    <option value="Basement">Basement</option>
                    <option value="Shared Room">Shared Room</option>
                    <option value="Private Room">Private Room</option>
                    <option value="Studio">Studio</option>
                </select>
            </div>

            <!-- Checkboxes -->
            <div class="flex flex-col sm:flex-row sm:items-center sm:gap-6">
                <label class="flex items-center text-gray-300 space-x-2">
                    <input type="checkbox" name="ensuite_washroom"
                        class="rounded border-gray-700 bg-gray-800 text-emerald-500 focus:ring-emerald-500">
                    <span>Ensuite Washroom</span>
                </label>
                <label class="flex items-center text-gray-300 space-x-2">
                    <input type="checkbox" name="pet_friendly"
                        class="rounded border-gray-700 bg-gray-800 text-emerald-500 focus:ring-emerald-500">
                    <span>Pet Friendly</span>
                </label>
            </div>

            <!-- Description -->
            <div>
                <label for="description" class="block text-sm font-medium text-gray-300 mb-1">Description</label>
                <textarea name="description" id="description" rows="5"
                    class="w-full bg-gray-900 border border-gray-700 text-gray-100 rounded-lg px-4 py-2 focus:ring-2 focus:ring-emerald-500 focus:border-transparent placeholder-gray-500"
                    placeholder="Describe the space, nearby transit, roommates, etc."></textarea>
            </div>

            <!-- Submit -->
            <div class="text-center pt-6 pb-4">
              <button type="submit"
                class="px-6 py-2.5 bg-emerald-600 text-white font-medium rounded-lg hover:bg-emerald-500 transition duration-150 shadow-lg hover:shadow-emerald-500/20">
                Publish Listing
              </button>
            
        </form>
    </div>
</section>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\Users\jjsr1\OneDrive\Desktop\4. PHP\roomiematch\resources\views/listings/create.blade.php ENDPATH**/ ?>