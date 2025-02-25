<?php

namespace App\Http\Controllers;

use App\Models\Friend;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\User;
use Illuminate\Support\Facades\Auth;

class FriendController extends Controller
{
    public function sendrequest($receiveId)
    {
        if (!Auth::check()) {
            return redirect('/login')->with('error', 'You must be logged in to send friend requests.');
        }

        $senderId = auth()->id();
        if ($senderId == $receiveId) {
            return redirect()->back()->with('error', 'You cannot send friend request to yourself');
        }
        $exists = Friend::where(function ($query) use ($senderId, $receiveId) {

            $query->where('sender_id', $senderId)->where('receiver_id', $receiveId);
        })->orWhere(function ($query) use ($senderId, $receiveId) {

            $query->where('sender_id', $receiveId)->where('receiver_id', $senderId);
        })->exists();

        if ($exists) {
            return redirect()->back()->with('error', 'Friend request already sent');
        }

        Friend::create([
            'sender_id'   => $senderId,
            'receiver_id' => $receiveId,
            'status'      => 'pending',
        ]);

        return redirect()->back()->with('message', 'Friend request sent');
    }
    public function acceptRequest($requestId)
    {
        $friendRequest = Friend::findOrFail($requestId);

        if ($friendRequest->receiver_id !== auth()->id()) {
            return redirect()->back()->with('error', 'Unauthorized action.');
        }

        $friendRequest->update(['status' => 'accepted']);
        return redirect()->back()->with('success', 'Friend request accepted.');
    }



    //  decline methode
    public function declineRequest($id)
    {
        $friendRequest = Friend::findOrFail($id);

        if ($friendRequest->receiver_id !== auth()->id()) {
            return redirect()->back()->with('error', 'Unauthorized action.');
        }

        $friendRequest->delete(); // Remove the request from the database

        return redirect()->back()->with('success', 'Friend request declined.');
    }





    public function friendRequests()
    {
        $requests = \App\Models\Friend::where('receiver_id', auth()->id())
            ->where('status', 'pending')
            ->get();
        return view('friends_Request', compact('requests'));
    }

    // the loading and showing of the friends list 
    public function friendsList()
    {
        $userId = auth()->id();

        $friends = Friend::where('status', 'accepted')
            ->where(function ($query) use ($userId) {
                $query->where('sender_id', $userId)
                    ->orWhere('receiver_id', $userId);
            })
            ->get();

        // Fetch user details
        $friendsList = $friends->map(function ($friend) use ($userId) {
            return $friend->sender_id == $userId ? $friend->receiver : $friend->sender;
        });

        return view('friends_list', compact('friendsList'));
    }

    public function profile($userId)
    {
        $user = User::findOrFail($userId);
        return view('profile_view', compact('user'));
    }
}
