<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\Friend;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

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
        $userId = auth()->id();

        // Get the list of accepted friends
        $friends = Friend::where('status', 'accepted')
            ->where(function ($query) use ($userId) {
                $query->where('sender_id', $userId)
                    ->orWhere('receiver_id', $userId);
            })
            ->get();

        // Extract friend IDs
        $friendIds = $friends->map(function ($friend) use ($userId) {
            return $friend->sender_id == $userId ? $friend->receiver_id : $friend->sender_id;
        });

        // Include the user's own posts
        $friendIds->push($userId);

        // Fetch posts only from the user and their friends
        $posts = Post::whereIn('user_id', $friendIds)->latest()->get();

        return view('dashboard', compact('posts'));
    }
    public function update(Request $request, Post $post)
    {
        $formFields = $request->validate([
            'content' => ['nullable', 'string'],
            'img' => ['nullable'],
        ]);
        if ($request->hasFile('img')) {
            $formFields['img'] = $request->file('img')->store('posts', 'public');
        }
        $post->update($formFields);
        return redirect()->route('dashboard')->with('message', 'Post updated successfully');
    }

    // the methode for delete a post
    public function destroy(Post $post)
    {
        // Ensure only the post owner can delete it
        // if (auth()->id() !== $post->user_id) {
        //     return back()->with('error', 'Unauthorized action');
        // }

        // Delete image if it exists
        if ($post->img) {
            Storage::delete('public/' . $post->img);
        }

        // Delete the post
        $post->delete();

        return redirect()->route('dashboard')->with('message', 'Post deleted successfully');
    }
}
