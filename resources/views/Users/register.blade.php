<x-layout>

    <div class="min-h-screen bg-gray-100 flex flex-col justify-center py-12 sm:px-6 lg:px-8">
        <div class="sm:mx-auto sm:w-full sm:max-w-md">
            <h2 class="mt-6 text-center text-3xl font-extrabold text-gray-900">Create your account</h2>
        </div>

        <div class="mt-8 sm:mx-auto sm:w-full sm:max-w-md">
            <div class="bg-white py-8 px-4 shadow sm:rounded-lg sm:px-10">
                <form class="space-y-6" action="/users" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div>
                        <label class="block text-sm font-medium text-gray-700">Profile Photo</label>
                        <div class="mt-1 flex items-center justify-center">
                           
                            <input type="file" name="img" class="w-full text-sm text-gray-500 file:mr-4 file:py-2 file:px-4 file:rounded-full file:border-0 file:text-sm file:font-semibold file:bg-purple-50 file:text-purple-600 hover:file:bg-purple-100"/>
                            @error('img')
                           <p class="text-red-500 text-xs mt-1">{{$message}}</p>
                            @enderror
                        </div>

                       
                    </div>

                    <div>
                        <label class="block text-sm font-medium text-gray-700">First Name</label>
                        <input type="text"name="first_name" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-purple-500 focus:ring-purple-500"/>
                        @error('first_name')
                        <p class="text-red-500 text-xs mt-1">{{$message}}</p>
                         @enderror
                    </div>

                    <div>
                        <label class="block text-sm font-medium text-gray-700">Last Name</label>
                        <input type="text"name="last_name" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-purple-500 focus:ring-purple-500"/>
                        @error('last_name')
                        <p class="text-red-500 text-xs mt-1">{{$message}}</p>
                         @enderror
                    </div>

                    <div>
                        <label class="block text-sm font-medium text-gray-700">Email</label>
                        
                        <input type="email"name="email" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-purple-500 focus:ring-purple-500"/>
                        @error('email')
                        <p class="text-red-500 text-xs mt-1">{{$message}}</p>
                         @enderror
                    </div>


                    <div>
                        <label class="block text-sm font-medium text-gray-700">Password</label>
                         <input type="password"name="password" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-purple-500 focus:ring-purple-500"/>
                         @error('password')
                         <p class="text-red-500 text-xs mt-1">{{$message}}</p>
                          @enderror
                        </div>
                        <div>
                            <label class="block text-sm font-medium text-gray-700">Confirm Password</label>
                            <input type="password" name="password_confirmation" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-purple-500 focus:ring-purple-500"/>
                            @error('password_confirmation')
                            <p class="text-red-500 text-xs mt-1">{{$message}}</p>
                            @enderror
                        </div>

                    <div>
                        <button type="submit" class="w-full flex justify-center py-2 px-4 border border-transparent rounded-md shadow-sm text-sm font-medium text-white bg-gradient-to-r from-purple-600 to-indigo-600 hover:from-purple-700 hover:to-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-purple-500">
                            Sign up
                        </button>
                        <div class="mt-4 text-center">
                            <a href="/login" class="text-sm text-purple-600 hover:text-purple-500">
                                Already have an account? Sign in
                            </a>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
    

</x-layout>