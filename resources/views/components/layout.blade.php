<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Vibe - Connect with Friends</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
</head>
<body class="bg-gray-100">
    <!-- Navigation -->
    <nav class="bg-gradient-to-r from-purple-600 to-indigo-600 shadow-lg">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex items-center justify-between h-16">
                <div class="flex-shrink-0">
                    <a href="/dashboard" class="text-white text-2xl font-bold">Vibe</a>
                </div>

                <!-- Search Bar -->
                <div class="flex-1 max-w-2xl mx-8">
                    <input type="text" 
                           placeholder="Search friends, posts, and more..." 
                           class="w-full px-4 py-2 rounded-full bg-white/20 text-white placeholder-gray-200 focus:outline-none focus:ring-2 focus:ring-white">
                </div>

                <div class="flex items-center space-x-4">
                    @auth
                        <span class="text-white font-medium">{{ Auth::user()->first_name }}</span>
                        <form method="POST" action="/logout">
                            @csrf
                            <button type="submit" class="bg-white text-purple-600 px-4 py-2 rounded-md font-medium hover:bg-gray-100 transition-colors">Logout</button>
                        </form>
                    @else
                        <a href="/register" class="bg-white text-purple-600 px-4 py-2 rounded-md font-medium hover:bg-gray-100 transition-colors">Sign Up</a>
                        <a href="/login" class="text-white hover:bg-white/10 px-4 py-2 rounded-md font-medium transition-colors">Login</a>
                    @endauth
                </div>
            </div>
        </div>
    </nav>

   
    <main>
        {{ $slot }}
    </main>
    <footer class="bg-white border-t border-gray-200">
        <div class="max-w-7xl mx-auto py-12 px-4 sm:px-6 lg:py-16 lg:px-8">
            <div class="flex flex-col items-center text-center md:flex-row md:justify-between">
                <div class="flex space-x-6">
                    <a href="/about" class="text-gray-500 hover:text-gray-700">About</a>
                    <a href="#" class="text-gray-500 hover:text-gray-700">Privacy</a>
                    <a href="#" class="text-gray-500 hover:text-gray-700">Terms</a>
                    <a href="#" class="text-gray-500 hover:text-gray-700">Contact</a>
                </div>
                <p class="mt-4 text-gray-500 md:mt-0">&copy; 2023 Vibe. All rights reserved.</p>
            </div>
        </div>
    </footer>
</body>
</html>

    