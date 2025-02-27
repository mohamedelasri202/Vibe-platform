<x-layout>
    <body class="bg-neutral-50">
        <!-- Main Container (existing structure) -->
        <div class="flex h-screen">
            <!-- Your Original Sidebar (existing structure) -->
            
            <!-- Styled Main Content -->
            <div class="flex-1 p-6 bg-gray-50 overflow-y-auto">
                <!-- Centered Content Container -->
                <div class="max-w-2xl mx-auto space-y-6">
                    <!-- Post Creation Card (existing structure) -->
                    
                    <!-- Posts Feed -->
                    <div class="space-y-5">
                        @foreach ($posts as $post)
                        <!-- Post Example -->
                        <div class="bg-white rounded-xl shadow-sm p-4 border border-gray-200">
                            <!-- Post content (existing structure) -->
                            
                            <!-- Comments Section -->
                            <div class="mt-4 space-y-3">
                                @foreach ($post->comments as $comment)
                                    <div class="flex items-start gap-3 group">
                                        <a href="{{ route('profile-view', $comment->user->id) }}" class="shrink-0">
                                            <img src="{{ asset('storage/'.$comment->user->img) }}" 
                                                 class="w-8 h-8 rounded-full object-cover shadow-sm mt-1">
                                        </a>
                                        <div class="flex-1">
                                            <div class="bg-gray-50 rounded-lg p-3">
                                                <a href="{{ route('profile-view', $comment->user->id) }}" 
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
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </body>
</x-layout>