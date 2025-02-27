<?php

namespace App\Http\Controllers;

use App\Models\like;
use App\Models\Post;
use Illuminate\Http\Request;

class likeController extends Controller
{
    public function addliek($postId)
    {
        $userId = auth()->id();

        // Check if the user already liked the post
        $like = Like::where('user_id', $userId)->where('post_id', $postId)->first();

        if ($like) {
            // Unlike if already liked
            $like->delete();
        } else {
            // Like the post
            Like::create([
                'user_id' => $userId,
                'post_id' => $postId
            ]);
        }

        return redirect()->back()->with('message', 'Post liked successfully');
    }
}
