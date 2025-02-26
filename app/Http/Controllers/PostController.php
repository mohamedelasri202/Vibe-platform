<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{
    public function store(Request $request)
    {
        // Validate input
        $request->validate([
            'content' => 'required|string',
            'img' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        // Handle file upload
        $imagePath = null;
        if ($request->hasFile('img')) {
            $imagePath = $request->file('img')->store('posts', 'public');
        }

        // Store post in the database
        Post::create([
            'user_id' => auth()->id(),
            'content' => $request->content,
            'img' => $imagePath,
        ]);

        // Redirect back with success message
        return redirect()->back()->with('success', 'Post created successfully!');
    }
    public function index()
    {
        $posts = Post::latest()->get();
        return view('dashboard', compact('posts'));
    }
}
