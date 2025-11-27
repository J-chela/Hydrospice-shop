<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Message;

class UserDashboardController extends Controller
{
    public function index()
    {
        $messages = Message::where('user_id', auth()->id())->latest()->get();
        return view('dashboard.index', compact('messages'));
    }

    public function orders()
    {
        return view('dashboard.orders');
    }

    public function settings()
    {
        return view('dashboard.settings');
    }

    public function favorites()
    {
        return view('dashboard.favorites');
    }
}