<?php

namespace App\Http\Controllers;

use App\Models\Friend;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
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
            'sender_id' => $senderId,
            'receiver_id' => $receiveId
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
    public function declineRequest($requestId)
    {
        $friendRequest = Friend::findOrFail($requestId);

        if ($friendRequest->receiver_id !== auth()->id()) {
            return redirect()->back()->with('error', 'Unauthorized action.');
        }

        $friendRequest->update(['status' => 'declined']);
        return redirect()->back()->with('success', 'Friend request declined.');
    }
}
