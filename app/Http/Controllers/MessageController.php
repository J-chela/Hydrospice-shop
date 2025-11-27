<?php

namespace App\Http\Controllers;

use App\Models\Message;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class MessageController extends Controller
{
    // Show inbox for user
    public function index()
    {
        $messages = Message::where('receiver_id', Auth::id())
            ->orWhere('sender_id', Auth::id())
            ->latest()
            ->get();

        return view('dashboard.messages.index', compact('messages'));
    }

    // Show form to send message
    public function create()
    {
        $admins = User::where('is_admin', true)->get();
        return view('dashboard.messages.create', compact('admins'));
    }

    // Store message
    public function store(Request $request)
    {
        $request->validate([
            'receiver_id' => 'required|exists:users,id',
            'message' => 'required|string|max:1000',
        ]);

        Message::create([
            'sender_id' => Auth::id(),
            'receiver_id' => $request->receiver_id,
            'message' => $request->message,
        ]);

        return redirect()->route('dashboard.messages.index')
            ->with('success', 'Message sent successfully!');
    }
}
