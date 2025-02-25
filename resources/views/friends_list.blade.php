<x-layout>
<body class="bg-gray-100">
    <div class="container mx-auto px-4 py-8">
        <h2 class="text-2xl font-bold mb-6">My Friends</h2>
        
        <!-- Friends List -->
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 gap-4">
            @if($friendsList->isEmpty())
                <p class="text-gray-500">You don't have any friends yet.</p>
            @else
                @foreach ($friendsList as $friend)
                <div class="bg-white rounded-lg shadow-md overflow-hidden p-4 transition-transform hover:scale-105">
                    <div class="flex flex-col items-center">
                        <img src="{{ 'storage/'.$friend->img }}" alt="Profile Picture" 
                            class="w-24 h-24 rounded-full border-4 border-white shadow-lg object-cover">
                        
                        <div class="text-center mt-4">
                            <h3 class="font-semibold text-lg">{{ $friend->first_name }} {{ $friend->last_name }}</h3>
                            
                            <div class="mt-4 space-y-2">
                                <!-- View Profile Button -->
                                <a href="{{ route('profile-view', $friend->id) }}" 
                                   class="block bg-blue-500 hover:bg-blue-600 text-white px-4 py-2 rounded transition">
                                    View Profile
                                </a>
                                
                                <!-- Unfriend Button -->
                                <form action="" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" 
                                            class="w-full bg-red-500 hover:bg-red-600 text-white px-4 py-2 rounded transition">
                                        Unfriend
                                    </button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
                @endforeach
            @endif
        </div>
    </div>
</body>
</x-layout>