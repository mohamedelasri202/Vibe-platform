<x-layout>
    <body class="bg-gray-50">
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
    
            <!-- Main Content -->
            <div class="flex-1 p-6 bg-gray-50 overflow-y-auto">
                <div class="max-w-2xl mx-auto space-y-6">
                    <!-- Profile Card -->
                    <div class="bg-white rounded-xl shadow-sm p-6 border border-gray-200">
                        <div class="relative w-full h-48 bg-gray-300 rounded-lg overflow-hidden">
                            <img src="/api/placeholder/800/200" alt="Cover Photo" class="w-full h-full object-cover">
                        </div>
                        
    
                        <!-- Profile Picture & Info -->
                        <div class="relative text-center -mt-16">
                            <img src="{{ asset('storage/'. $user->img) }}" alt="{{ $user->first_name }}" class="w-32 h-32 rounded-full border-4 border-white object-cover mx-auto">
                            <h1 class="mt-3 text-2xl font-bold text-gray-900">{{ $user->first_name }} {{ $user->last_name }}</h1>
                            <p class="text-gray-500">{{ $user->email }}</p>
                        </div>



    
                        <!-- Bio Section -->

                  
                        @if(auth::user()->id == $user->id)
                        
                            <div class="flex justify-between items-start">
                              
                                    <a href="/edite" class="btn btn-primary"><button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded-md hover:bg-blue-600 transition">
                                        Edit Profile
                                    </button></a>
                            
                                
                            </div>
                        
                        <div class="border-t border-gray-200 pt-4 mt-4">
                            <h2 class="text-xl font-semibold mb-2">Bio</h2>
                            <p class="text-gray-600">{{ $user->bio }}</p>
                        </div>
                        @endif
                    
                    </div>
                    
    
                    <!-- User Posts -->
                    <div class="space-y-5">
                        @if($user->posts->isEmpty())
                            <p class="text-center text-gray-500">No posts yet.</p>
                        @else
                            @foreach ($user->posts as $post)
                                <div class="bg-white rounded-xl shadow-sm p-4 border border-gray-200 hover:border-gray-300 transition-colors">
                                    <div class="flex items-start gap-3">
                                        <img src="{{ asset('storage/'.$post->user->img) }}" 
                                             alt="User Name" 
                                             class="w-12 h-12 rounded-full object-cover border-2 border-white shadow-sm">
                                        <div class="flex-1">
                                            <div class="flex items-baseline gap-2 mb-1">
                                                <a href="{{ route('profileview', $post->user->id) }}" class="font-semibold text-gray-800">{{ $post->user->first_name }}</a>
                                                <span class="text-sm text-gray-500">· {{ $post->created_at->diffForHumans() }}</span>
                                            </div>
                    
                                            <!-- Editable Post Content -->
                                            <div id="post-content-{{ $post->id }}">
                                                <p class="text-gray-800 leading-relaxed mb-4">{{ $post->content }}</p>
                                                @if($post->img)
                                                    <img src="{{ asset('storage/'.$post->img) }}" 
                                                         alt="Post image" 
                                                         class="w-full rounded-lg object-cover shadow-sm mb-4">
                                                @endif
                                            </div>
                    
                                            <!-- Edit Form (Initially hidden) -->
                                            <form action="{{ route('edite-post', $post->id) }}" method="POST" enctype="multipart/form-data" id="edit-form-{{ $post->id }}" style="display: none;">
                                                @csrf
                                                @method('PUT')
                                                
                                                <!-- Editable Text Area -->
                                                <textarea name="content" id="content-{{ $post->id }}" class="w-full p-3 text-gray-800 rounded-lg border-none focus:ring-2 focus:ring-blue-200 resize-none placeholder-gray-500 bg-gray-50 min-h-[100px]" required>{{ $post->content }}</textarea>
                                                
                                                <!-- Editable Image -->
                                                @if($post->img)
                                                    <img src="{{ asset('storage/'.$post->img) }}" alt="Post Image" class="w-32 h-32 object-cover my-3" id="img-preview-{{ $post->id }}">
                                                @endif
                                                <input type="file" name="img" class="" accept="image/*" id="img-upload-{{ $post->id }}">
                    
                                                <div class="flex items-center justify-between mt-4">
                                                    <button type="submit" class="px-5 py-2 bg-blue-500 text-white rounded-lg hover:bg-blue-600 transition-colors font-medium shadow-sm hover:shadow-md">Save</button>
                                                    <button type="button" class="px-5 py-2 bg-gray-500 text-white rounded-lg hover:bg-gray-600 transition-colors font-medium shadow-sm hover:shadow-md" onclick="cancelEdit({{ $post->id }})">Cancel</button>
                                                </div>
                                            </form>
                    
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
                                        @if(auth::user()->id == $user->id)
                                        <div>
                                            <!-- Edit Icon -->
                                            <i class="far fa-edit h-12 w-12 cursor-pointer" onclick="editPost({{ $post->id }})"></i>
                                        </div>
                                       <div>
                                            <!-- Delete Icon -->
                                            <form action="{{ route('delete-post', $post->id) }}" method="POST" class="inline">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="text-red-500 hover:text-red-700">
                                                    <i class="fa-solid fa-trash"></i>
                                                </button>
                                            </form>
                                    </div>
                                        @endif
                                    </div>
                                </div>
                            @endforeach
                        @endif
                    </div>
                </div>                    
        </div>

        
    </body>
</x-layout>


<script>


function editPost(postId) {
    let contentDiv = document.getElementById(`post-content-${postId}`);
    let editForm = document.getElementById(`edit-form-${postId}`);

    // Toggle visibility
    if (editForm.style.display === 'none' || editForm.style.display === '') {
        contentDiv.style.display = 'none'; // Hide post content
        editForm.style.display = 'block'; // Show edit form
    } else {
        contentDiv.style.display = 'block'; // Show post content
        editForm.style.display = 'none'; // Hide edit form
    }
}
</script>

