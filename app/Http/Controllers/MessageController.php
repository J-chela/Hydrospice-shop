<?php

namespace App\Http\Controllers;

use App\Models\Message;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class MessageController extends Controller
{
    // Show inbox for logged-in user
    public function index()
    {
        $messages = Message::where('receiver_id', Auth::id())
            ->orWhere('sender_id', Auth::id())
            ->latest()
            ->get();

        return view('dashboard.messages.index', compact('messages'));
    }

    // Show the create message page
    public function create()
    {
        $admins = User::where('is_admin', true)->get();
        return view('dashboard.messages.create', compact('admins'));
    }

    // Store message (supports AJAX + normal POST)
    public function store(Request $request)
{
    $request->validate([
        'receiver_id' => 'required|exists:users,id',
        'message' => 'required|string|max:1000',
    ]);

    $message = Message::create([
        'sender_id' => Auth::id(),
        'receiver_id' => $request->receiver_id,
        'message' => $request->message,
    ]);

    broadcast(new MessageSent($message))->toOthers();

    return response()->json([
        'message' => $message,
        'created_at' => $message->created_at->format('H:i'),
    ]);
}
    // Store organization message to admin
    public function storeOrganizationMessage(Request $request)
    {
        $request->validate([
            'subject' => 'required|string|max:255',
            'body' => 'required|string|max:2000',
        ]);

        // Automatically send all organization messages to admin
        // If you want manual admin selection, pass receiver_id in the form
        $admin = User::where('is_admin', true)->firstOrFail();

        $message = Message::create([
            'sender_id' => Auth::id(),
            'receiver_id' => $admin->id,
            'subject' => $request->subject,
            'body' => $request->body,
        ]);

        // If AJAX request, send JSON back
        if ($request->ajax()) {
            return response()->json([
                'id' => $message->id,
                'subject' => $message->subject,
                'body' => $message->body,
                'created_at' => $message->created_at->toDateTimeString(),
            ]);
        }

        // If normal request (fallback)
        return redirect()
            ->route('messages.index')
            ->with('success', 'Message sent successfully!');
    }
}
