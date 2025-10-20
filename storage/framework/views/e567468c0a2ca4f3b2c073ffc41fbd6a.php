<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register - RoomieMatch</title>
    <?php echo app('Illuminate\Foundation\Vite')(['resources/css/app.css', 'resources/js/app.js']); ?>
</head>
<body class="min-h-screen flex items-center justify-center bg-gray-900 text-white">

    <div class="w-full max-w-md bg-gray-800 shadow-lg rounded-2xl p-8 space-y-6">
        <!-- Header -->
        <div class="text-center space-y-1">
            <h1 class="text-3xl font-extrabold text-indigo-400">Create an Account</h1>
            <p class="text-gray-400 text-sm">
                Join RoomieMatch and find your perfect roommate today!
            </p>
        </div>

        <!-- Form -->
        <form method="POST" action="<?php echo e(route('register')); ?>" class="space-y-5">
            <?php echo csrf_field(); ?>

            <!-- Name -->
            <div>
                <label for="name" class="block text-sm font-medium text-gray-300">Full Name</label>
                <input id="name" name="name" type="text" required autofocus autocomplete="name"
                    class="block mt-1 w-full rounded-md border-gray-600 bg-gray-900 text-white focus:border-indigo-500 focus:ring-indigo-500" />
            </div>

            <!-- Email -->
            <div>
                <label for="email" class="block text-sm font-medium text-gray-300">Email</label>
                <input id="email" name="email" type="email" required autocomplete="username"
                    class="block mt-1 w-full rounded-md border-gray-600 bg-gray-900 text-white focus:border-indigo-500 focus:ring-indigo-500" />
            </div>

            <!-- Password -->
            <div>
                <label for="password" class="block text-sm font-medium text-gray-300">Password</label>
                <input id="password" name="password" type="password" required autocomplete="new-password"
                    class="block mt-1 w-full rounded-md border-gray-600 bg-gray-900 text-white focus:border-indigo-500 focus:ring-indigo-500" />
            </div>

            <!-- Confirm Password -->
            <div>
                <label for="password_confirmation" class="block text-sm font-medium text-gray-300">Confirm Password</label>
                <input id="password_confirmation" name="password_confirmation" type="password" required autocomplete="new-password"
                    class="block mt-1 w-full rounded-md border-gray-600 bg-gray-900 text-white focus:border-indigo-500 focus:ring-indigo-500" />
            </div>

            <!-- Register Button -->
            <div>
                <button type="submit"
                    class="w-full py-3 bg-indigo-500 hover:bg-indigo-600 text-white font-semibold rounded-lg transition duration-150 ease-in-out shadow-md">
                    Register
                </button>
            </div>
        </form>

        <!-- Footer -->
        <div class="text-center text-sm text-gray-400">
            Already have an account?
            <a href="<?php echo e(route('login')); ?>" class="text-indigo-400 hover:text-indigo-300 font-medium">
                Log in
            </a>
        </div>
    </div>

</body>
</html>
<?php /**PATH C:\Users\jjsr1\OneDrive\Desktop\4. PHP\roomiematch\resources\views/auth/register.blade.php ENDPATH**/ ?>