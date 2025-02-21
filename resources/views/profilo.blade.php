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


    <div class="flex flex-col min-h-screen">
        <!-- Left Sidebar (Same as previous) -->
        <div class="w-20 bg-white border-r flex flex-col items-center py-6 space-y-8">
            <!-- Sidebar icons from previous design -->
        </div>

        <!-- Main Content -->
        <div class="flex-1 flex flex-col">
            <!-- Top Bar (Same as previous) -->
        

            <!-- Profile Edit Content -->
            <div class="flex-1 p-8 max-w-3xl mx-auto w-full">
                <!-- Profile Header -->
                <div class="mb-8">
                    <h1 class="text-2xl font-semibold text-gray-700 mb-2">Profile Settings</h1>
                    <p class="text-gray-500">Update your personal information</p>
                </div>

                <!-- Profile Photo Section -->
                <form method="POST" action="{{ route('profil.update', Auth::user()->id) }}" enctype="multipart/form-data">
    @csrf
    @method('PUT')
    <!-- Profile Photo Section -->
    <div class="bg-white p-6 rounded-xl border mb-6">
        <div class="flex items-center justify-between mb-4">
            <h3 class="font-medium text-gray-700">Profile Photo</h3>
            <button type="button" class="text-blue-500 hover:text-blue-600">
                <i class="fas fa-pencil-alt"></i>
            </button>
        </div>
        <div class="flex items-center gap-6">
            <div class="relative">
                <img src="{{ asset('storage/'. Auth::user()->img) }}" alt="{{ Auth::user()->first_name }}"
                     class="w-24 h-24 rounded-full border-4 border-white shadow-sm">
                <button type="button" class="absolute bottom-0 right-0 bg-white p-2 rounded-full shadow-md hover:bg-gray-50">
                    <i class="fas fa-camera text-gray-600"></i>
                </button>
            </div>
            <p class="text-sm text-gray-500">JPG or PNG, max 2MB</p>
            <!-- File Input for Updating Profile Photo -->
            <input type="file" name="img" class="mt-4">
        </div>
    </div>

    <!-- Personal Information Section -->
    <div class="bg-white p-6 rounded-xl border mb-6">
        <div class="flex items-center justify-between mb-4">
            <h3 class="font-medium text-gray-700">Personal Information</h3>
            <button type="button" class="text-blue-500 hover:text-blue-600">
                <i class="fas fa-pencil-alt"></i>
            </button>
        </div>
        
        <div class="grid grid-cols-2 gap-6">
            <div>
                <label class="text-sm text-gray-600">First Name</label>
                <div class="flex items-center gap-2 mt-2">
                    <input type="text" 
                           name="first_name"
                           value="{{ Auth::user()->first_name }}" 
                           class="w-full px-4 py-2 bg-neutral-50 rounded-lg border focus:ring-1 ring-blue-500 focus:border-blue-500">
                </div>
            </div>

            <div>
                <label class="text-sm text-gray-600">Last Name</label>
                <div class="flex items-center gap-2 mt-2">
                    <input type="text" 
                           name="last_name"
                           value="{{  Auth::user()->last_name }}" 
                           class="w-full px-4 py-2 bg-neutral-50 rounded-lg border focus:ring-1 ring-blue-500 focus:border-blue-500">
                </div>
            </div>

        </div>
    </div>

    <!-- Account Settings Section -->
    <div class="bg-white p-6 rounded-xl border mb-6">
        <div class="flex items-center justify-between mb-4">
            <h3 class="font-medium text-gray-700">Account Settings</h3>
            <button type="button" class="text-blue-500 hover:text-blue-600">
                <i class="fas fa-pencil-alt"></i>
            </button>
        </div>

        <div class="space-y-4">
            <div>
                <label class="text-sm text-gray-600">Email Address</label>
                <div class="flex items-center gap-2 mt-2">
                    <input type="email" 
                           name="email"
                           value="{{ Auth::user()->email }}" 
                           class="w-full px-4 py-2 bg-neutral-50 rounded-lg border focus:ring-1 ring-blue-500 focus:border-blue-500">
                </div>
            </div>

            <div>
                <label class="text-sm text-gray-600">Password</label>
                <div class="flex items-center gap-2 mt-2">
                    <input type="password" 
                           name="password"
                           placeholder="Enter new password" 
                           class="w-full px-4 py-2 bg-neutral-50 rounded-lg border focus:ring-1 ring-blue-500 focus:border-blue-500">
                    <button type="button" class="text-gray-500 hover:text-blue-500">
                        <i class="fas fa-eye"></i>
                    </button>
                </div>
            </div>
        </div>
    </div>

    <!-- Save Button -->
    <div class="flex justify-end">
        <button type="submit" class="px-6 py-2 bg-blue-500 text-white rounded-lg hover:bg-blue-600 transition-colors">
            Save Changes
        </button>
    </div>
</form>

            </div>
        </div>
    </div>

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
