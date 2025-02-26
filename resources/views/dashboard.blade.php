
<x-layout>
    <body class="bg-neutral-50">
        <!-- Main Container -->
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

            <!-- Styled Main Content -->
            <div class="flex-1 p-6 bg-gray-50 overflow-y-auto">
                <!-- Centered Content Container -->
                <div class="max-w-2xl mx-auto space-y-6">
                    <!-- Post Creation Card -->
                    <div class="bg-white rounded-xl shadow-sm p-4 border border-gray-200">
                        <div class="flex items-start gap-3">
                            <img src="{{ asset('storage/'. Auth::user()->img) }}" 
                                 alt="{{ Auth::user()->first_name }}" 
                                 class="w-12 h-12 rounded-full object-cover border-2 border-white shadow-sm">
                            <div class="flex-1">
                                <form class="space-y-4" action="{{ route('post.add') }}" method="POST" enctype="multipart/form-data">
                                    @csrf 
                                    <textarea name="content" 
                                              placeholder="What's on your mind?" 
                                              class="w-full p-3 text-gray-800 rounded-lg border-none 
                                                     focus:ring-2 focus:ring-blue-200 resize-none
                                                     placeholder-gray-500 bg-gray-50 min-h-[100px]"></textarea>
                                    <div class="flex items-center justify-between">
                                        <div class="flex items-center gap-4 text-gray-500">
                                            <label class="flex items-center gap-1.5 cursor-pointer 
                                                          hover:text-blue-500 transition-colors">
                                                <i class="fas fa-image text-green-500 text-lg"></i>
                                                <span class="text-sm font-medium">Add Photo</span>
                                                <input type="file" name="img" class="hidden" accept="image/*">
                                            </label>
                                        </div>
                                        <button type="submit" 
                                                class="px-5 py-2 bg-blue-500 text-white rounded-lg 
                                                      hover:bg-blue-600 transition-colors font-medium
                                                      shadow-sm hover:shadow-md">
                                            Post
                                        </button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>

                    <!-- Posts Feed -->
                    <div class="space-y-5">
                        @if ($posts->isEmpty() )
                    <h4> thers no posts to show</h4>
                        @else
                            @foreach ($posts as $post )
                        <!-- Post Example -->
                        <div class="bg-white rounded-xl shadow-sm p-4 border border-gray-200 hover:border-gray-300 transition-colors">
                            <div class="flex items-start gap-3">
                                <img src="{{asset('storage/'.$post->user->img)}}" 
                                     alt="User Name" 
                                     class="w-12 h-12 rounded-full object-cover border-2 border-white shadow-sm">
                                <div class="flex-1">
                                    <div class="flex items-baseline gap-2 mb-1">
                                       <a href="{{ route('profile-view', $post->user->id) }}" <h4 class="font-semibold text-gray-800">{{$post->user->first_name}}</h4></a>
                                        <span class="text-sm text-gray-500">· 2h ago</span>
                                    </div>
                                    <p class="text-gray-800 leading-relaxed mb-4">
                                        {{$post->content}}
                                    </p>
                                    <img src="{{asset('storage/'.$post->img)}}" 
                                         alt="Post image" 
                                         class="w-full rounded-lg object-cover shadow-sm mb-4">
                                    
                                    <!-- Interaction Buttons -->
                                    <div class="flex items-center gap-4 pt-3 border-t border-gray-100">
                                        <button class="flex items-center gap-1.5 text-gray-500 hover:text-blue-500">
                                            <i class="far fa-comment text-lg"></i>
                                            <span class="text-sm">24 comments</span>
                                        </button>
                                        <button class="flex items-center gap-1.5 text-gray-500 hover:text-red-500">
                                            <i class="far fa-heart text-lg"></i>
                                            <span class="text-sm">148 likes</span>
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>
                        @endforeach
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </body>
</x-layout>