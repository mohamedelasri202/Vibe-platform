<x-layout>
<body class="bg-gray-100">
    <div class="flex h-screen">
        <!-- Your Original Sidebar -->
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

    <div class="container mx-auto">
        <h2 class="text-2xl font-bold mb-6">Friend Requests</h2>
        
        <!-- Grid of user cards -->
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 gap-4">
            @if($requests->isEmpty())

            <p>You have no friends requests</p>
            @else

             @foreach ($requests as $request)
                
          
            <!-- Single Card Example -->
            <div class="bg-white rounded-lg shadow-md overflow-hidden p-4">
                <div class="flex flex-col items-center">
                    <img src="{{'storage/'.$request->sender->img}}" alt="Profile" 
                        class="w-24 h-24 rounded-full border-4 border-white shadow-lg">
                </div>
                <div class="text-center mt-4">
                    <h3 class="font-semibold text-lg">{{$request->sender->first_name}} {{$request->sender->last_name}}</h3>
                    <p class="text-gray-500 text-sm mt-1">Sent you a friend request</p>
                    
                    <!-- Action Buttons -->
                    <div class="mt-4 space-y-2">
                        <!-- Accept Button -->
                        <form action="{{ route('friends.accept', $request->id) }}" method="POST" class="inline-block">
                            @csrf
                            <button type="submit" class="bg-green-500 text-white px-4 py-2 rounded">Accept</button>
                        </form>
                        <!-- Reject Button -->
                        <form action="{{ route('decline-request', $request->id) }}" method="POST" class="inline-block">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="bg-red-500 text-white px-4 py-2 rounded">Decline</button>
                        </form>
                        
                        <a href="{{ route('profileview', $request->id) }}" 
                            class="block bg-blue-500 hover:bg-blue-600 text-white px-4 py-2 rounded transition">
                             View Profile
                         </a>
                    </div>
                </div>
            </div>
            @endforeach
            @endif
        </div>
    </div>
</body>
</x-layout>
