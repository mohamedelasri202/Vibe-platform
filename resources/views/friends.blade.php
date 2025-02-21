<x-layout>
<body class="bg-gray-100 ">
    <div class="container mx-auto">
        <h2 class="text-2xl font-bold mb-6">People You May Know</h2>
        <div class="relative">
            <input type="text" 
                   class="w-64 px-4 py-2 bg-neutral-100 rounded-lg focus:outline-none focus:ring-1 ring-blue-500"
                   placeholder="Search...">
        </div>
        
        <!-- Grid of user cards -->
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 gap-4">
            <!-- User Card 1 -->
            @foreach($users as $user)
            <div class="bg-white rounded-lg shadow-md overflow-hidden p-4">
                <div class="flex flex-col items-center">
                    <img src="{{asset('storage/'.$user->img)}}" alt="Profile" 
                        class="w-24 h-24 rounded-full border-4 border-white shadow-lg">
                </div>
               
                <div class="text-center mt-4">
                    <h3 class="font-semibold text-lg">{{ $user->first_name }} {{ $user->last_name }}</h3>
                    <p class="text-gray-500 text-sm mt-1">5 mutual friends</p>
                    
                    <!-- Action Buttons -->
                    <div class="mt-4 space-y-2">
                        <button class="w-full bg-blue-500 text-white py-2 px-4 rounded-md hover:bg-blue-600 transition">
                            Add Friend
                        </button>
                        <button class="w-full bg-gray-200 text-gray-700 py-2 px-4 rounded-md hover:bg-gray-300 transition">
                            Remove
                        </button>
                        <a href="#" class="block text-center text-blue-500 hover:underline text-sm">View Profile</a>
                    </div>
                </div>
                @endforeach
            </div>
          
        </div>
    </div>
</body>
</html>
</x-layout>