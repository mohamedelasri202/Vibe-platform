<x-layout>
<body class="bg-gray-100">
    <!-- Navigation -->
   

    <!-- Hero Section -->
    <div class="bg-gradient-to-r from-indigo-500 to-purple-600">
        <div class="max-w-7xl mx-auto py-16 px-4 sm:py-24 sm:px-6 lg:px-8">
            <div class="text-center">
                <h1 class="text-4xl font-extrabold text-white sm:text-5xl md:text-6xl">
                    Welcome to <span class="text-indigo-200">Vibe</span>
                </h1>
                <p class="mt-3 max-w-md mx-auto text-base text-indigo-100 sm:text-lg md:mt-5 md:text-xl md:max-w-3xl">
                    Connect with friends, share your stories, discover new communities, and build meaningful connections.
                </p>
                <div class="mt-5 max-w-md mx-auto sm:flex sm:justify-center md:mt-8">
                    @auth
                        <a href="/dashboard" class="inline-flex items-center justify-center px-8 py-3 border border-transparent text-base font-medium rounded-md text-indigo-600 bg-white hover:bg-gray-50 md:py-4 md:text-lg md:px-10">
                            Go to Dashboard
                        </a>
                    @else
                        <a href="/register" class="inline-flex items-center justify-center px-8 py-3 border border-transparent text-base font-medium rounded-md text-indigo-600 bg-white hover:bg-gray-50 md:py-4 md:text-lg md:px-10">
                            Get Started
                        </a>
                    @endauth
                </div>
            </div>
        </div>
    </div>

    <!-- Features Section -->
    <div class="max-w-7xl mx-auto py-16 px-4 sm:py-24 sm:px-6 lg:px-8">
        <div class="grid grid-cols-1 gap-8 md:grid-cols-3">
            <!-- Connect Card -->
            <div class="p-6 bg-white rounded-lg shadow-md">
                <div class="flex items-center mb-4">
                    <div class="w-12 h-12 bg-indigo-100 rounded-full flex items-center justify-center">
                        <i class="fas fa-users text-indigo-600"></i>
                    </div>
                    <h3 class="ml-4 text-xl font-semibold">Connect with Friends</h3>
                </div>
                <p class="text-gray-600">Find old friends, make new connections, and build your social network.</p>
            </div>

            <!-- Share Card -->
            <div class="p-6 bg-white rounded-lg shadow-md">
                <div class="flex items-center mb-4">
                    <div class="w-12 h-12 bg-indigo-100 rounded-full flex items-center justify-center">
                        <i class="fas fa-comment-dots text-indigo-600"></i>
                    </div>
                    <h3 class="ml-4 text-xl font-semibold">Share Your Story</h3>
                </div>
                <p class="text-gray-600">Post updates, photos, and videos. Comment, like, and interact with your community.</p>
            </div>

            <!-- Discover Card -->
            <div class="p-6 bg-white rounded-lg shadow-md">
                <div class="flex items-center mb-4">
                    <div class="w-12 h-12 bg-indigo-100 rounded-full flex items-center justify-center">
                        <i class="fas fa-compass text-indigo-600"></i>
                    </div>
                    <h3 class="ml-4 text-xl font-semibold">Discover More</h3>
                </div>
                <p class="text-gray-600">Join groups, follow pages, and explore events happening around you.</p>
            </div>
        </div>
    </div>

    <!-- Footer -->


    {{-- yeeled the content this is where the view suppose to go --}}

</x-layout>

    