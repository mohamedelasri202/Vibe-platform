<x-layout>
    <body class="bg-neutral-50">
        <!-- Main Container -->
        <div class="flex h-screen">
            <!-- Original Sidebar -->
            <div class="w-20 bg-white border-r flex flex-col items-center py-6 space-y-8">
                <!-- Profile -->
                <div class="group relative">
                   <a href="{{ route('profileview', auth()->id()) }}"> <img src="{{ asset('storage/'. Auth::user()->img) }}" alt="{{ Auth::user()->first_name }}" class="w-10 h-10 rounded-full"></a>
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

            <!-- Main Content -->
            <div class="flex-1 p-6 bg-gray-50 overflow-y-auto">
                <!-- Centered Content -->
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
                            class="w-full p-3 text-gray-800 rounded-lg border-none focus:ring-2 focus:ring-blue-200 resize-none placeholder-gray-500 bg-gray-50 min-h-[100px]"></textarea>
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
                        @if ($posts->isEmpty())
                            <h4 class="text-gray-500 text-center py-6">There's no posts to show</h4>
                        @else
                            @foreach ($posts as $post)
                            <div class="bg-white rounded-xl shadow-sm p-4 border border-gray-200 hover:border-gray-300 transition-colors">
                                <div class="flex items-start gap-3">
                                    <img src="{{asset('storage/'.$post->user->img)}}" 
                                         alt="User Name" 
                                         class="w-12 h-12 rounded-full object-cover border-2 border-white shadow-sm">
                                    <div class="flex-1">
                                        <div class="flex items-baseline gap-2 mb-1">
                                           <a href="{{ route('profileview', $post->user->id) }}" class="font-semibold text-gray-800 hover:underline">{{$post->user->first_name}}</a>
                                            <span class="text-sm text-gray-500">· {{ $post->created_at->diffForHumans() }}</span>
                                        </div>
                                        <p class="text-gray-800 leading-relaxed mb-4">
                                            {{$post->content}}
                                        </p>
                                        @if($post->img)
                                            <img src="{{asset('storage/'.$post->img)}}" 
                                                 alt="Post image" 
                                                 class="w-full h-80 rounded-lg object-cover shadow-sm mb-4">
                                        @endif

                                        <!-- Comments Section -->
                                        <div class="mt-4 space-y-3">
                                            @foreach ($post->comments as $comment)
                                                <div class="flex items-start gap-3 group">
                                                    <a href="{{ route('profileview', $comment->user->id) }}" class="shrink-0">
                                                        <img src="{{ asset('storage/'.$comment->user->img) }}" 
                                                             class="w-8 h-8 rounded-full object-cover shadow-sm mt-1">
                                                    </a>
                                                    <div class="flex-1">
                                                        <div class="bg-gray-50 rounded-lg p-3">
                                                            <a href="{{ route('profileview', $comment->user->id) }}" 
                                                               class="text-sm font-semibold text-blue-600 hover:underline">
                                                                {{ $comment->user->first_name }} {{ $comment->user->last_name }}
                                                            </a>
                                                            <p class="text-gray-700 text-sm mt-1 leading-5">
                                                                {{ $comment->content }}
                                                            </p>
                                                        </div>
                                                        <div class="text-xs text-gray-500 mt-1 ml-2">
                                                            {{ $comment->created_at->diffForHumans() }}
                                                        </div>
                                                    </div>
                                                </div>
                                            @endforeach
                                        </div>

                                        <!-- Interaction Buttons -->
                                        <div class="pt-4 mt-4 border-t border-gray-100 space-y-4">
                                            <!-- Like Button -->
                                            <form action="{{ route('likeadd', $post->id) }}" method="POST" class="inline-block">
                                                @csrf
                                                <button type="submit" 
                                                        class="flex items-center gap-1.5 text-gray-600 hover:text-red-500 transition-colors duration-200">
                                                    <span class="relative">
                                                        @if ($post->likes->where('user_id', auth()->id())->count())
                                                            <i class="fas fa-heart text-red-500"></i>
                                                            <span class="absolute opacity-0 group-hover:opacity-100 transition-opacity -right-5 text-[10px] text-red-500">
                                                                Unlike
                                                            </span>
                                                        @else
                                                            <i class="far fa-heart"></i>
                                                            <span class="absolute opacity-0 group-hover:opacity-100 transition-opacity -right-5 text-[10px] text-red-500">
                                                                Like
                                                            </span>
                                                        @endif
                                                    </span>
                                                    <span class="text-sm font-medium {{ $post->likes->count() ? 'text-red-500' : 'text-gray-500' }}">
                                                        {{ $post->likes->count() }}
                                                    </span>
                                                </button>
                                            </form>

                                            <!-- Comment Form -->
                                            <form action="{{ route('add-comment', $post->id) }}" method="POST" class="flex gap-3 items-start">
                                                @csrf
                                                <img src="{{ asset('storage/'. Auth::user()->img) }}" 
                                                     class="w-8 h-8 rounded-full object-cover shadow-sm">
                                                <div class="flex-1">
                                                    <textarea name="content" 
                                                              rows="1"
                                                              placeholder="Write a comment..."
                                                              class="w-full px-3 py-2 text-sm border border-gray-200 rounded-full focus:ring-2 focus:ring-blue-200 focus:border-transparent placeholder-gray-400 resize-none transition-all"></textarea>
                                                </div>
                                                <button type="submit" 
                                                        class="text-sm px-4 py-1.5 bg-blue-500 text-white rounded-full 
                                                              hover:bg-blue-600 transition-colors shadow-sm">
                                                    Post
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
            </div>
        </div>
    </body>
</x-layout>