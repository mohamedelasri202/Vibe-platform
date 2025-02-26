<x-layout>
    <body class="bg-gray-100">
        <div class="flex h-screen">
            <!-- Sidebar -->
            <div class="w-20 bg-white border-r flex flex-col items-center py-6 space-y-8">
                <!-- Profile -->
                <div class="group relative">
                   <a href="/profilo"> <img src="{{ asset('storage/'. Auth::user()->img) }}" alt="{{ Auth::user()->first_name }}" class="w-10 h-10 rounded-full"></a>
                    <div class="absolute left-14 top-0 bg-white p-2 rounded shadow-md text-sm hidden group-hover:block">
                        My Profile
                    </div>
                </div>
    
                <!-- Icons -->
                <div class="space-y-8">
                    <div class="group relative">
                        <a href="/friends"><i class="fas fa-user-plus text-xl text-gray-500 cursor-pointer hover:text-blue-500"></i></a>
                        <div class="absolute left-14 top-0 bg-white p-2 rounded shadow-md text-sm hidden group-hover:block">
                            Add Friends
                        </div>
                    </div>
    
                    <div class="group relative">
                        <a href="{{route('frinds_list')}}">
                            <i class="fas fa-comments text-xl text-gray-500 cursor-pointer hover:text-blue-500"></i>
                        </a>
                        <div class="absolute left-14 top-0 bg-white p-2 rounded shadow-md text-sm hidden group-hover:block">
                            Messages
                        </div>
                        <span class="absolute -top-2 -right-2 bg-red-500 text-white text-xs px-1.5 rounded-full">2</span>
                    </div>
    
                    <div class="group relative">
                        <a href="{{ route('friend_requests') }}"><i class="fas fa-users text-xl text-gray-500 cursor-pointer hover:text-blue-500"></i></a>
                        <div class="absolute left-14 top-0 bg-white p-2 rounded shadow-md text-sm hidden group-hover:block">
                            Friends
                        </div>
                        <span class="absolute -top-2 -right-2 bg-blue-500 text-white text-xs px-1.5 rounded-full">3</span>
                    </div>
                </div>
            </div>
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
                        <img src="{{ asset('storage/'. Auth::user()->img) }}" alt="{{ Auth::user()->first_name }}" class="w-40 h-40 rounded-full border-4 border-white object-cover">
                      
                    </div>
                </div>
                
                <!-- Profile Info -->
                <div class="px-6 pt-24 pb-6">
                    <div class="flex justify-between items-start">
                        <div>
                            <h1 class="text-3xl font-bold text-gray-900">{{Auth::user()->first_name}}</h1>
                        </div>
                        <form action="/edite" method="GET">
                            @csrf
                            <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded-md hover:bg-blue-600 transition">
                                Edit Profile
                            </button>
                        </form>
                    </div>
                    
                    <!-- User Details -->
                    <div class="mt-6 space-y-4">
                        <div class="flex items-center text-gray-600">
                            <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" 
                                    d="M16 12a4 4 0 10-8 0 4 4 0 008 0zm0 0v1.5a2.5 2.5 0 005 0V12a9 9 0 10-9 9m4.5-1.206a8.959 8.959 0 01-4.5 1.207" />
                            </svg>
                            <span>{{Auth::user()->email}}</span>
                        </div>
                        
                        <div class="border-t border-gray-200 pt-4 mt-4">
                            <h2 class="text-xl font-semibold mb-2">Bio</h2>
                            <p class="text-gray-600">
                               {{Auth::user()->bio}}.
                            </p>
                        </div>
                        
                        <div class="border-t border-gray-200 pt-4">
                            <h2 class="text-xl font-semibold mb-2">Details</h2>
                            <div class="grid grid-cols-2 gap-4">
                                <div>
                                    <p class="text-gray-500">{{Auth::user()->last_name}}</p>
                                    <p class="font-medium">{{Auth::user()->first_name}}</p>
                                </div>
                               
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </x-layout>
    