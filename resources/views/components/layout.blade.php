<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=+, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <title>Document</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
</head>
<body>
    <nav class="bg-gradient-to-r from-purple-600 to-indigo-600 shadow-lg">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex items-center justify-between h-16">
                <div class="flex-shrink-0">
                    <a href="#" class="text-white text-2xl font-bold">Vibe</a>
                </div>
                <div class="hidden md:block">
                    <div class="ml-10 flex items-baseline space-x-4">
                        <a href="#" class="text-gray-200 hover:text-white px-3 py-2 rounded-md text-sm font-medium">Home</a>
                        <a href="#" class="text-gray-200 hover:text-white px-3 py-2 rounded-md text-sm font-medium">About</a>
                        <a href="#" class="text-gray-200 hover:text-white px-3 py-2 rounded-md text-sm font-medium">Contact</a>
                    </div>
                </div>
                @auth
                    
            <div class="flex items-center space-x-4">
                <span class="text-white font-medium">{{ Auth::user()->first_name }}</span>
                <form method="POST" action="/logout">
                    @csrf
                    <button type="submit" class="bg-white text-purple-600 px-4 py-2 rounded-md font-medium hover:bg-gray-100 transition-colors">Logout</button>
                </form>
            </div>
            
                 
             @else
                 
             
                <div class="flex items-center space-x-4">
                    <a href="/register" class="bg-white text-purple-600 px-4 py-2 rounded-md font-medium hover:bg-gray-100 transition-colors">Sign Up</a>
                    <a href="/login" class="text-white hover:bg-white/10 px-4 py-2 rounded-md font-medium transition-colors">Login</a>
                </div>
                @endauth
            </div>
        </div>
    </nav>

    {{-- yeeled the content this is where the view suppose to go --}}
    <main>
        {{ $slot }}
    </main>
    <footer class="bg-gray-800 text-white py-8">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="md:flex md:items-center md:justify-between">
                <div class="flex justify-center md:order-2">
                    <p class="text-gray-400">© 2023 Vibe. All rights reserved.</p>
                </div>
                <div class="mt-4 md:mt-0 md:order-1">
                    <div class="flex space-x-6">
                        <a href="#" class="text-gray-300 hover:text-white">Privacy</a>
                        <a href="#" class="text-gray-300 hover:text-white">Terms</a>
                        <a href="#" class="text-gray-300 hover:text-white">Contact</a>
                    </div>
                </div>
            </div>
        </div>
    </footer>
    </body>
    </html>

     </body>
    </html>

    