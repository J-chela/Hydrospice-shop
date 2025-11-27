<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class SettingsController extends Controller
{
    public function index()
    {
        return view('Dashboard.settings'); // your Blade path
    }


    // 🌙 TOGGLE THEME
    public function toggleTheme()
    {
        $user = Auth::user();
        $user->theme = ($user->theme === 'dark') ? 'light' : 'dark';
        $user->save();

        return back();
    }


    // 📸 UPDATE PROFILE PHOTO
    public function updatePhoto(Request $request)
    {
        $request->validate([
            'photo' => 'required|image|max:2048'
        ]);

        $path = $request->file('photo')->store('profile-photos', 'public');

        $user = Auth::user();
        $user->profile_photo = $path;
        $user->save();

        return back()->with('success', 'Profile photo updated!');
    }


    // 📝 UPDATE NAME + EMAIL
    public function updateInfo(Request $request)
    {
        $request->validate([
            'name'  => 'required',
            'email' => 'required|email'
        ]);

        $user = Auth::user();
        $user->update($request->only('name', 'email'));

        return back()->with('success', 'Account info updated!');
    }


    // 🔐 UPDATE PASSWORD
    public function updatePassword(Request $request)
    {
        $request->validate([
            'current_password' => 'required',
            'new_password' => 'required|min:6'
        ]);

        $user = Auth::user();

        if (!Hash::check($request->current_password, $user->password)) {
            return back()->withErrors(['current_password' => 'Incorrect current password']);
        }

        $user->password = Hash::make($request->new_password);
        $user->save();

        return back()->with('success', 'Password updated successfully!');
    }


    // ❌ DELETE ACCOUNT
    public function deleteAccount()
    {
        $user = Auth::user();
        Auth::logout();
        $user->delete();

        return redirect('/')->with('success', 'Account deleted successfully.');
    }
}
