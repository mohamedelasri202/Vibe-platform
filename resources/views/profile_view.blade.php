<x-layout>
    <body class="bg-gray-100">
        <div class="container mx-auto px-4 py-8">
            <!-- Profile Card -->
            <div class="bg-white rounded-lg shadow-lg max-w-2xl mx-auto">
                <!-- Cover Image -->
                <div class="h-48 bg-gray-300 rounded-t-lg relative">
                    <img src="/api/placeholder/800/200" alt="Cover Photo" class="w-full h-full object-cover rounded-t-lg">
                </div>
                
                <!-- Profile Picture -->
                <div class="relative px-6">
                    <div class="absolute -top-20">
                        <img src="{{ asset('storage/'. $user->img) }}" alt="{{ $user->first_name }}" class="w-40 h-40 rounded-full border-4 border-white object-cover">
                    </div>
                </div>
                
                <!-- Profile Info -->
                <div class="px-6 pt-24 pb-6">
                    <div class="flex justify-between items-start">
                        <div>
                            <h1 class="text-3xl font-bold text-gray-900">{{ $user->first_name }}</h1>
                        </div>
                    </div>
                    
                    <!-- User Details -->
                    <div class="mt-6 space-y-4">
                        <div class="flex items-center text-gray-600">
                            <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" 
                                    d="M16 12a4 4 0 10-8 0 4 4 0 008 0zm0 0v1.5a2.5 2.5 0 005 0V12a9 9 0 10-9 9m4.5-1.206a8.959 8.959 0 01-4.5 1.207" />
                            </svg>
                            <span>{{ $user->email }}</span>
                        </div>
                        
                        <div class="border-t border-gray-200 pt-4 mt-4">
                            <h2 class="text-xl font-semibold mb-2">Bio</h2>
                            <p class="text-gray-600">
                               {{ $user->bio }}
                            </p>
                        </div>
                        
                        <div class="border-t border-gray-200 pt-4">
                            <h2 class="text-xl font-semibold mb-2">Details</h2>
                            <div class="grid grid-cols-2 gap-4">
                                <div>
                                    <p class="text-gray-500">{{ $user->last_name }}</p>
                                    <p class="font-medium">{{ $user->first_name }}</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </x-layout>