<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Message;
use App\Models\Category;

class UserDashboardController extends Controller
{
    public function index()
    {
        $messages = Message::where('user_id', auth()->id())->latest()->get();
        $categories = Category::all(); // <-- Added this

        return view('dashboard.index', compact('messages', 'categories'));
    }

    public function plants()
    {
        return view('dashboard.plants');
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
