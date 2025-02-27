<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\Comment;
use Illuminate\Http\Request;

class CommentController extends Controller
{
    public function store(request $request, $postId)
    {
        $request->validate([
            'content' => 'required|string|max:500',
        ]);

        Comment::create([
            'user_id' => auth()->id(),
            'post_id' => $postId,
            'content' => $request->content,
        ]);
        return redirect()->back()->with('message', 'comment added successfully');
    }



    public function index($postId)
    {
        // Fetch the post with its comments
        $comments = Comment::all();


        return view('dashboard', compact('comments'));
    }
}
