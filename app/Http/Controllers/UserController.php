<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Hashing\BcryptHasher;
use Termwind\Components\Raw;

class UserController extends Controller
{
    // show the the registr form 
    public function create()
    {
        return view('User.register');
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

    public function logout(Request $request)
    {
        auth()->logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect('/')->with('message', 'you have been logged out ');
    }
    // login 
    public function login()
    {
        return view('User.login');
    }

    public function authenticate(Request $request)
    {
        $formFields = $request->validate([

            // Ensure only valid image types
            'email' => ['required', 'email'], // Ensure email is valid and unique
            'password' => ['required'], // Minimum 6 characters and requires confirmation
        ]);
        if (auth()->attempt($formFields)) {
            $request->session()->regenerate();
            return redirect('dashboard')->with('message', 'you are loged in ');
        }
        return back()->withErrors(['email' => 'invlid credentials'])->onlyInput('email');
    }


    // load the view for the dashborrd 
    public function dashboard()
    {
        return view('dashboard');
    }

    // show the profile 
    public function profilo()
    {
        return view('profilo');
    }
}
