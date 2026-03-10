<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class AdminMessageController extends Controller
{
    public function index()
    {
        return view('admin.messages.index');
    }

    public function show($id)
    {
        return view('admin.messages.show', compact('id'));
    }

    public function reply(Request $request, $id)
    {
        // logic for replying to message later
        return back()->with('success', 'Reply sent!');
    }
}