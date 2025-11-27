<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AdminController extends Controller
{
    // Main admin dashboard (GET /admin)
    public function index()
    {
        return view('admin.dashboard');
    }

    // Optional: Admin users management page
    public function users()
    {
        return view('admin.users');
    }

    // Optional: Admin products management page
    public function products()
    {
        return view('admin.products');
    }

    // Optional: Admin orders management page
    public function orders()
    {
        return view('admin.orders');
    }
}
