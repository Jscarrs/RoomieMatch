

<?php $__env->startSection('content'); ?>
<section class="bg-gray-900 min-h-screen">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-10">

        <!-- Header -->
        <div class="flex flex-col sm:flex-row sm:items-center sm:justify-between gap-4 mb-10">
            <div>
                <h1 class="text-3xl font-extrabold text-white tracking-tight">
                    Welcome back, <span class="text-emerald-400"><?php echo e(Auth::user()->name ?? 'User'); ?></span> 👋
                </h1>
                <p class="mt-2 text-gray-400">Manage your listings, messages, and favourites from one place.</p>
            </div>
            <a href="<?php echo e(route('listings.create')); ?>"
               class="inline-flex items-center px-5 py-2.5 bg-emerald-600 text-white font-medium rounded-lg hover:bg-emerald-500 shadow-lg hover:shadow-emerald-500/20 transition-all duration-150">
                <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                          d="M12 6v6m0 0v6m0-6h6m-6 0H6"/>
                </svg>
                New Listing
            </a>
        </div>

        <!-- Stats -->
        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6 mb-10">
            <!-- My Listings -->
            <div class="bg-gray-800 hover:bg-gray-750 rounded-xl shadow-lg p-6 flex items-center gap-4 transition duration-150">
                <div class="p-3 rounded-lg bg-emerald-900/40">
                    <svg class="w-6 h-6 text-emerald-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                              d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6"/>
                    </svg>
                </div>
                <div>
                    <p class="text-sm text-gray-400 font-medium">My Listings</p>
                    <p class="text-3xl font-bold text-white"><?php echo e($myListingsCount ?? 0); ?></p>
                </div>
            </div>

            <!-- Messages -->
            <div class="bg-gray-800 hover:bg-gray-750 rounded-xl shadow-lg p-6 flex items-center gap-4 transition duration-150">
                <div class="p-3 rounded-lg bg-sky-900/40">
                    <svg class="w-6 h-6 text-sky-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                              d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"/>
                    </svg>
                </div>
                <div>
                    <p class="text-sm text-gray-400 font-medium">Unread Messages</p>
                    <p class="text-3xl font-bold text-white"><?php echo e($messagesCount ?? 0); ?></p>
                </div>
            </div>

            <!-- Favorites -->
            <div class="bg-gray-800 hover:bg-gray-750 rounded-xl shadow-lg p-6 flex items-center gap-4 transition duration-150">
                <div class="p-3 rounded-lg bg-rose-900/40">
                    <svg class="w-6 h-6 text-rose-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                              d="M4.318 6.318a4.5 4.5 0 016.364 0L12 7.5l1.318-1.182a4.5 4.5 0 116.364 6.364L12 21l-7.682-7.682a4.5 4.5 0 010-6.364z"/>
                    </svg>
                </div>
                <div>
                    <p class="text-sm text-gray-400 font-medium">Favourites</p>
                    <p class="text-3xl font-bold text-white"><?php echo e($favoritesCount ?? 0); ?></p>
                </div>
            </div>
        </div>

        <!-- Profile Summary -->
        <div class="bg-gray-800 rounded-xl shadow-lg p-6 mb-8">
            <h2 class="text-lg font-semibold text-white mb-4 border-b border-gray-700 pb-2">Profile Summary</h2>
            <div class="grid sm:grid-cols-2 gap-4 text-sm">
                <div>
                    <p class="text-gray-400">Email</p>
                    <p class="text-white font-medium"><?php echo e(Auth::user()->email); ?></p>
                </div>
                <div>
                    <p class="text-gray-400">University Verification</p>
                    <p class="text-emerald-400 flex items-center gap-1">
                        <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 20 20">
                            <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586l-1.293-1.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"/>
                        </svg>
                        Verified
                    </p>
                </div>
            </div>
        </div>

        <!-- Activity -->
        <div class="bg-gray-800 rounded-xl shadow-lg p-6">
            <h2 class="text-lg font-semibold text-white mb-4 border-b border-gray-700 pb-2">Recent Activity</h2>
            <p class="text-sm text-gray-400">No recent activity yet. Start by creating a listing or sending a message.</p>
        </div>
    </div>
</section>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\Users\jjsr1\OneDrive\Desktop\4. PHP\roomiematch\resources\views/user/dashboard.blade.php ENDPATH**/ ?>