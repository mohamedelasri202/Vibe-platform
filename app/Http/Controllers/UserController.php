<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Hashing\BcryptHasher;

class UserController extends Controller
{
    // show the the registr form 
    public function create()
    {
        return view('users.register');
    }
    // store  create new user 
    public function store(Request $request)
    {
        // Validate the form input
        $formFields = $request->validate([
            'first_name' => ['required', 'string', 'min:3'],
            'last_name' => ['required', 'string', 'min:3'],
            'img' => ['required', 'image', 'mimes:jpg,jpeg,png,gif', 'max:2048'], // Ensure only valid image types
            'email' => ['required', 'email', 'unique:users,email'], // Ensure email is valid and unique
            'password' => ['required', 'string', 'min:6', 'confirmed'], // Minimum 6 characters and requires confirmation
        ]);

        // Handle the image upload and store the image path
        if ($request->hasFile('img')) {
            $formFields['img'] = $request->file('img')->store('images', 'public');
        }

        // Hash the password
        $formFields['password'] = bcrypt($formFields['password']);

        // Create the new user
        $user = User::create($formFields);

        // Log the user in
        auth()->login($user);

        // Redirect with a success message
        return redirect('/')->with('message', 'User created and logged in');
    }
}
