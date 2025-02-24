<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Termwind\Components\Raw;
use Illuminate\Hashing\BcryptHasher;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    // show the the registr form 
    public function create()
    {
        return view('Users.register');
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

        // Hash the password if it is set
        if (!empty($formFields['password'])) {
            $formFields['password'] = bcrypt($formFields['password']);
        } else {
            unset($formFields['password']);
        }

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
        return redirect('/login')->with('message', 'you have been logged out ');
    }
    // login 
    public function login()
    {
        return view('Users.login');
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

    public function friends(Request $request)
    {

        $search = $request->input('search');


        if ($search) {
            $users = User::where('id', '!=', auth()->id())
                ->where(function ($query) use ($search) {
                    $query->where('first_name', 'like', "%{$search}%")
                        ->orWhere('last_name', 'like', "%{$search}%")
                        ->orWhere('email', 'like', "%{$search}%");
                })
                ->get();
        } else {
            $users = User::where('id', '!=', auth()->id())->get();
        }

        return view('friends', compact('users'));
    }





    // load the view for the dashborrd 
    public function dashboard()
    {
        return view('dashboard');
    }

    // show the profile 



    public function profilo()
    {
        return view('profilo',  ['user' => Auth::user()]);
    }
    public function edite()
    {
        return view('edite');
    }

    public function update(Request $request, User $user)
    {
        $formFields = $request->validate([
            'first_name' => ['required', 'string', 'min:3'],
            'last_name' => ['required', 'string', 'min:3'],
            'img' => ['nullable', 'image', 'mimes:jpg,jpeg,png,gif', 'max:2048'],
            'email' => ['required', 'email', 'unique:users,email,' . $user->id],
            'password' => ['nullable', 'string', 'min:6'],
            'bio' => ['nullable', 'string', 'max:65535'],
        ]);


        if ($request->hasFile('img')) {
            $formFields['img'] = $request->file('img')->store('images', 'public');
        }

        $formFields['password'] = bcrypt($formFields['password']);

        $user->update($formFields);



        return redirect('/profilo')->with('message', 'User created and logged in');
    }
}
