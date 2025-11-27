<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        // Example: later we’ll fetch user's orders or plants here
        return view('dashboard');
    }
}
