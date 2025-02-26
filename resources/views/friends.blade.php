<x-layout>
    <div class="flex h-screen w-full bg-gray-100">
        <!-- Sidebar -->
        <div class="w-20 bg-white border-r flex flex-col items-center py-6 space-y-8 h-full">
            <!-- Profile -->
            <div class="group relative">
                <a href="/profilo">
                    <img src="{{ asset('storage/' . Auth::user()->img) }}" 
                        alt="{{ Auth::user()->first_name }}" 
                        class="w-12 h-12 rounded-full border-2 border-gray-300">
                </a>
                <div class="absolute left-14 top-1/2 -translate-y-1/2 bg-white p-2 rounded shadow-md text-sm hidden group-hover:flex">
                    My Profile
                </div>
            </div>

            <!-- Icons -->
            <div class="space-y-8">
                <div class="group relative">
                    <a href="/friends">
                        <i class="fas fa-user-plus text-2xl text-gray-500 cursor-pointer hover:text-blue-500"></i>
                    </a>
                    <div class="absolute left-14 top-1/2 -translate-y-1/2 bg-white p-2 rounded shadow-md text-sm hidden group-hover:flex">
                        Add Friends
                    </div>
                </div>

                <div class="group relative">
                    <a href="{{ route('frinds_list') }}">
                        <i class="fas fa-comments text-2xl text-gray-500 cursor-pointer hover:text-blue-500"></i>
                    </a>
                    <div class="absolute left-14 top-1/2 -translate-y-1/2 bg-white p-2 rounded shadow-md text-sm hidden group-hover:flex">
                        Messages
                    </div>
                    <span class="absolute -top-2 -right-2 bg-red-500 text-white text-xs px-1.5 rounded-full">2</span>
                </div>

                <div class="group relative">
                    <a href="{{ route('friend_requests') }}">
                        <i class="fas fa-users text-2xl text-gray-500 cursor-pointer hover:text-blue-500"></i>
                    </a>
                    <div class="absolute left-14 top-1/2 -translate-y-1/2 bg-white p-2 rounded shadow-md text-sm hidden group-hover:flex">
                        Friends
                    </div>
                    <span class="absolute -top-2 -right-2 bg-blue-500 text-white text-xs px-1.5 rounded-full">3</span>
                </div>
            </div>
        </div>

        <!-- Main Content -->
        <div class="flex-1 p-8">
            <div class="max-w-7xl mx-auto">
                <h2 class="text-2xl font-bold mb-6">People You May Know</h2>
                <form method="GET" action="/friends" class="flex mb-6">
                    <input type="text" name="search" placeholder="Search friends..." 
                        class="flex-grow p-2 border rounded-l-md focus:outline-none focus:ring-2 focus:ring-blue-500">
                    <button class="bg-blue-500 text-white px-6 py-2 rounded-r-md hover:bg-blue-600 transition" 
                        type="submit">
                        Search
                    </button>
                </form>
            </div>

            <!-- User Cards Grid -->
            <div class="grid grid-cols-2 md:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 gap-4 p-4">
                @foreach($users as $user)
                <div class="bg-white rounded-lg shadow-md overflow-hidden p-4 h-auto">
                    <div class="flex flex-col items-center">
                        <img src="{{ asset('storage/'.$user->img) }}" alt="Profile" 
                            class="w-24 h-24 rounded-full border-4 border-white shadow-lg">
                    </div>
                    <div class="text-center mt-4">
                        <h3 class="font-semibold text-lg">{{ $user->first_name }} {{ $user->last_name }}</h3>
                        <p class="text-gray-500 text-sm mt-1">5 mutual friends</p>
                        
                        <!-- Action Buttons -->
                        <div class="mt-4 space-y-2">
                            <!-- Send Friend Request Button -->
                            <form action="{{ route('friends.request', $user->id) }}" method="POST">
                                @csrf
                                <button type="submit" class="w-full bg-blue-500 text-white py-2 px-4 rounded-md hover:bg-blue-600 transition">
                                    Add Friend
                                </button>
                            </form>
                            <!-- Remove button -->
                            <button class="w-full bg-gray-200 text-gray-700 py-2 px-4 rounded-md hover:bg-gray-300 transition">
                                Remove
                            </button>
                            <a href="#" class="block text-center text-blue-500 hover:underline text-sm">View Profile</a>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </div>
</x-layout>
