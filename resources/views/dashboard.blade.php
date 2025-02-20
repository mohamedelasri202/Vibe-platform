<x-layout>
  
    <body class="bg-neutral-50">
        <!-- Main Container -->
        <div class="flex h-screen">
            <!-- Left Sidebar -->
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
                        <i class="fas fa-user-plus text-xl text-gray-500 cursor-pointer hover:text-blue-500"></i>
                        <div class="absolute left-14 top-0 bg-white p-2 rounded shadow-md text-sm hidden group-hover:block">
                            Add Friends
                        </div>
                    </div>
    
                    <div class="group relative">
                        <i class="fas fa-comments text-xl text-gray-500 cursor-pointer hover:text-blue-500"></i>
                        <div class="absolute left-14 top-0 bg-white p-2 rounded shadow-md text-sm hidden group-hover:block">
                            Messages
                        </div>
                        <span class="absolute -top-2 -right-2 bg-red-500 text-white text-xs px-1.5 rounded-full">2</span>
                    </div>
    
                    <div class="group relative">
                        <i class="fas fa-users text-xl text-gray-500 cursor-pointer hover:text-blue-500"></i>
                        <div class="absolute left-14 top-0 bg-white p-2 rounded shadow-md text-sm hidden group-hover:block">
                            Friends
                        </div>
                        <span class="absolute -top-2 -right-2 bg-blue-500 text-white text-xs px-1.5 rounded-full">3</span>
                    </div>
                </div>
            </div>
    
            <!-- Main Content -->
            <div class="flex-1 flex flex-col">
                <!-- Top Bar -->
                <div class="h-16 bg-white border-b flex items-center justify-between px-6">
                    <div class="text-xl font-semibold text-gray-700">Connections</div>
                    <div class="flex items-center gap-4">
                        <div class="relative">
                            <input type="text" 
                                   class="w-64 px-4 py-2 bg-neutral-100 rounded-lg focus:outline-none focus:ring-1 ring-blue-500"
                                   placeholder="Search...">
                        </div>
                        <i class="fas fa-bell text-gray-500 hover:text-blue-500 cursor-pointer"></i>
                    </div>
                </div>
    
                <!-- Content Area -->
                <div class="flex-1 p-6 overflow-auto">
                    <!-- People to Add -->
                    <div class="mb-8">
                        <h2 class="text-lg font-semibold mb-4 text-gray-700">Suggested Connections</h2>
                        <div class="grid grid-cols-3 gap-4">
                            <!-- Person Card -->
                            <div class="bg-white p-4 rounded-xl border hover:shadow-md transition-shadow">
                                <div class="flex items-center gap-4">
                                    <img src="https://via.placeholder.com/40" class="w-12 h-12 rounded-full">
                                    <div>
                                        <h3 class="font-medium">Jane Smith</h3>
                                        <p class="text-sm text-gray-500">Developer</p>
                                    </div>
                                </div>
                                <button class="w-full mt-4 px-4 py-2 bg-blue-500 text-white rounded-lg hover:bg-blue-600 text-sm">
                                    Connect
                                </button>
                            </div>
                            <!-- Repeat more cards -->
                        </div>
                    </div>
    
                    <!-- Friend Requests -->
                    <div class="mb-8">
                        <h2 class="text-lg font-semibold mb-4 text-gray-700">Connection Requests</h2>
                        <div class="space-y-3">
                            <!-- Request Item -->
                            <div class="bg-white p-4 rounded-xl border flex items-center justify-between">
                                <div class="flex items-center gap-4">
                                    <img src="https://via.placeholder.com/40" class="w-10 h-10 rounded-full">
                                    <div>
                                        <h3 class="font-medium">Mike Johnson</h3>
                                        <p class="text-sm text-gray-500">2 mutual connections</p>
                                    </div>
                                </div>
                                <div class="flex gap-2">
                                    <button class="px-4 py-2 bg-blue-500 text-white rounded-lg text-sm hover:bg-blue-600">
                                        Accept
                                    </button>
                                    <button class="px-4 py-2 bg-neutral-100 rounded-lg text-sm hover:bg-neutral-200">
                                        Decline
                                    </button>
                                </div>
                            </div>
                            <!-- Repeat more requests -->
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </body>
    </html>
</x-layout>