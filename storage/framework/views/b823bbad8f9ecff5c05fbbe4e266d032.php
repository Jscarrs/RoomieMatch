
<?php $__env->startSection('title', 'Contact Us'); ?>
<?php $__env->startSection('content'); ?>

<div class="max-w-4xl mx-auto">
    <!-- Header -->
    <div class="text-center mb-12">
        <h1 class="text-4xl font-bold text-gray-900 dark:text-white mb-4">Contact Us</h1>
        <p class="text-lg text-gray-600 dark:text-gray-300">Have questions? We'd love to hear from you. Send us a message and we'll respond as soon as possible.</p>
    </div>

    <!-- Contact Form -->
    <div class="bg-white dark:bg-gray-800 rounded-lg shadow-lg p-8">
        <form action="#" method="POST" class="space-y-6">
            <?php echo csrf_field(); ?>
            
            <!-- Full Name -->
            <div>
                <label for="name" class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">
                    Full Name
                </label>
                <input 
                    type="text" 
                    id="name" 
                    name="name" 
                    required
                    placeholder="Enter your name"
                    class="w-full px-4 py-3 border border-gray-300 dark:border-gray-600 rounded-lg focus:ring-2 focus:ring-indigo-500 focus:border-transparent dark:bg-gray-700 dark:text-white transition duration-150"
                >
            </div>

            <!-- Email Address -->
            <div>
                <label for="email" class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">
                    Email Address
                </label>
                <input 
                    type="email" 
                    id="email" 
                    name="email" 
                    required
                    placeholder="Enter your email"
                    class="w-full px-4 py-3 border border-gray-300 dark:border-gray-600 rounded-lg focus:ring-2 focus:ring-indigo-500 focus:border-transparent dark:bg-gray-700 dark:text-white transition duration-150"
                >
            </div>

            <!-- Message -->
            <div>
                <label for="message" class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">
                    Message
                </label>
                <textarea 
                    id="message" 
                    name="message" 
                    rows="6" 
                    required
                    placeholder="Type your message here"
                    class="w-full px-4 py-3 border border-gray-300 dark:border-gray-600 rounded-lg focus:ring-2 focus:ring-indigo-500 focus:border-transparent dark:bg-gray-700 dark:text-white transition duration-150 resize-none"
                ></textarea>
            </div>

            <!-- Submit Button -->
            <div>
                <button 
                    type="submit"
                    class="w-full px-6 py-3 bg-indigo-600 border border-transparent rounded-lg font-semibold text-sm text-white uppercase tracking-widest hover:bg-indigo-700 focus:bg-indigo-700 active:bg-indigo-900 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 transition ease-in-out duration-150"
                >
                    Send Message
                </button>
            </div>
        </form>

        <!-- Success Message (hidden by default) -->
        <div id="success-message" class="hidden mt-6 p-4 bg-green-100 dark:bg-green-900 border border-green-400 dark:border-green-600 rounded-lg">
            <p class="text-green-700 dark:text-green-200 font-medium">
                ✓ Your message has been sent successfully!
            </p>
        </div>
    </div>

    <!-- Contact Info Cards -->
    <div class="grid grid-cols-1 md:grid-cols-3 gap-6 mt-12">
        <!-- Email Card -->
        <div class="bg-white dark:bg-gray-800 rounded-lg shadow-md p-6 text-center">
            <div class="inline-flex items-center justify-center w-12 h-12 bg-indigo-100 dark:bg-indigo-900 rounded-full mb-4">
                <svg class="w-6 h-6 text-indigo-600 dark:text-indigo-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"></path>
                </svg>
            </div>
            <h3 class="text-lg font-semibold text-gray-900 dark:text-white mb-2">Email</h3>
            <p class="text-gray-600 dark:text-gray-300">support@roomiematch.com</p>
        </div>

        <!-- Phone Card -->
        <div class="bg-white dark:bg-gray-800 rounded-lg shadow-md p-6 text-center">
            <div class="inline-flex items-center justify-center w-12 h-12 bg-indigo-100 dark:bg-indigo-900 rounded-full mb-4">
                <svg class="w-6 h-6 text-indigo-600 dark:text-indigo-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z"></path>
                </svg>
            </div>
            <h3 class="text-lg font-semibold text-gray-900 dark:text-white mb-2">Phone</h3>
            <p class="text-gray-600 dark:text-gray-300">+1 (555) 123-4567</p>
        </div>

        <!-- Location Card -->
        <div class="bg-white dark:bg-gray-800 rounded-lg shadow-md p-6 text-center">
            <div class="inline-flex items-center justify-center w-12 h-12 bg-indigo-100 dark:bg-indigo-900 rounded-full mb-4">
                <svg class="w-6 h-6 text-indigo-600 dark:text-indigo-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"></path>
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"></path>
                </svg>
            </div>
            <h3 class="text-lg font-semibold text-gray-900 dark:text-white mb-2">Office</h3>
            <p class="text-gray-600 dark:text-gray-300">123 University Ave, Campus City</p>
        </div>
    </div>
</div>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.public', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\Users\jjsr1\OneDrive\Desktop\4. PHP\roomiematch\resources\views/contact.blade.php ENDPATH**/ ?>