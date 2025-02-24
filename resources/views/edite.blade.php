<x-layout>
    <div class="bg-gray-100 min-h-screen flex items-center justify-center">
        <div class="container mx-auto px-4 py-8">
            <form action=" /edite/{{ Auth::user()->id }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                
                <div class="bg-white rounded-lg shadow-lg max-w-2xl mx-auto relative">
                    
                    <!-- Cover Image -->
                    <div class="h-48 bg-gray-300 rounded-t-lg relative">
                        <img src="/api/placeholder/800/200" alt="Cover Photo" class="w-full h-full object-cover rounded-t-lg">
                        <div class="absolute bottom-2 right-2">
                            <input type="file" name="cover_image" class="text-sm text-gray-600">
                        </div>
                    </div>

                    <!-- Profile Picture -->
                    <div class="relative flex justify-center -mt-16">
                        <label for="img" class="cursor-pointer">
                            <img id="preview" src="{{ asset('storage/' . Auth::user()->img) }}" 
                                 alt="{{ Auth::user()-> }}" 
                                 class="w-40 h-40 rounded-full border-4 border-white object-cover">
                            <input type="file" name="img" id="img" class="hidden" onchange="previewImage(this)">
                        </label>
                    </div>
                    
                    <div class="px-6 py-4">
                        <!-- Name -->
                        <div class="mb-4">
                            <label class="text-gray-500">First Name</label>
                            <input type="text" name="first_name" value="{{ Auth::user()->first_name }}" class="w-full border rounded p-2">
                        </div>

                        <div class="mb-4">
                            <label class="text-gray-500">Last Name</label>
                            <input type="text" name="last_name" value="{{ Auth::user()->last_name }}" class="w-full border rounded p-2">
                        </div>

                        <!-- Email -->
                        <div class="mb-4">
                            <label class="text-gray-500">Email</label>
                            <input type="email" name="email" value="{{ Auth::user()->email }}" class="w-full border rounded p-2">
                        </div>

                        <!-- Bio -->
                        <div class="mb-4">
                            <label class="text-gray-500">Bio</label>
                            <textarea name="bio" class="w-full border rounded p-2 text-gray-600" rows="4">{{ Auth::user()->bio }}</textarea>
                        </div>

                        <!-- Password -->
                        <div class="mb-4">
                            <label class="text-gray-500">New Password</label>
                            <input type="password" name="password" class="w-full border rounded p-2" placeholder="Enter new password">
                        </div>

                        <div class="mb-4">
                            <label class="text-gray-500">Confirm Password</label>
                            <input type="password" name="password_confirmation" class="w-full border rounded p-2" placeholder="Confirm new password">
                        </div>

                        <!-- Save Button -->
                        <div class="mt-6">
                            <button type="submit" class="w-full bg-blue-500 text-white px-4 py-2 rounded-md hover:bg-blue-600 transition">
                                Save Changes
                            </button>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>

    <script>
        function previewImage(input) {
            if (input.files && input.files[0]) {
                var reader = new FileReader();
                reader.onload = function(e) {
                    document.getElementById('preview').src = e.target.result;
                }
                reader.readAsDataURL(input.files[0]);
            }
        }
    </script>
</x-layout>
