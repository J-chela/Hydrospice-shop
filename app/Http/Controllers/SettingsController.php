<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;

class SettingsController extends Controller
{
    public function index()
    {
        return view('Dashboard.settings');
    }


    /*
    |--------------------------------------------------------------------------
    | 🌙 Toggle Theme
    |--------------------------------------------------------------------------
    */
    public function toggleTheme()
    {
        $user = Auth::user();
        $user->theme = $user->theme === 'dark' ? 'light' : 'dark';
        $user->save();

        return back();
    }


    /*
    |--------------------------------------------------------------------------
    | 📸 Update Profile Photo
    |--------------------------------------------------------------------------
    */
    public function updatePhoto(Request $request)
    {
        $request->validate([
            'photo' => 'required|image|mimes:jpg,jpeg,png,webp|max:2048'
        ]);

        $user = Auth::user();

        // Delete old photo if exists
        if ($user->profile_photo && Storage::disk('public')->exists($user->profile_photo)) {
            Storage::disk('public')->delete($user->profile_photo);
        }

        // Store new photo
        $path = $request->file('photo')->store('profile-photos', 'public');

        $user->profile_photo = $path;
        $user->save();

        return back()->with('success', 'Profile photo updated!');
    }


    /*
    |--------------------------------------------------------------------------
    | 📝 Update User Info
    |--------------------------------------------------------------------------
    */
    public function updateInfo(Request $request)
    {
        $request->validate([
            'name'  => 'required|string|max:255',
            'email' => 'required|email|max:255'
        ]);

        Auth::user()->update($request->only('name', 'email'));

        return back()->with('success', 'Account info updated!');
    }


    /*
    |--------------------------------------------------------------------------
    | 🔐 Update Password
    |--------------------------------------------------------------------------
    */
    public function updatePassword(Request $request)
    {
        $request->validate([
            'current_password' => 'required',
            'new_password'     => 'required|min:6|confirmed'
        ]);

        $user = Auth::user();

        if (!Hash::check($request->current_password, $user->password)) {
            return back()->withErrors([
                'current_password' => 'Incorrect current password'
            ]);
        }

        $user->password = Hash::make($request->new_password);
        $user->save();

        return back()->with('success', 'Password updated successfully!');
    }


    /*
    |--------------------------------------------------------------------------
    | ❌ Delete Account
    |--------------------------------------------------------------------------
    */
    public function deleteAccount()
    {
        $user = Auth::user();

        Auth::logout();

        // Delete profile photo if exists
        if ($user->profile_photo && Storage::disk('public')->exists($user->profile_photo)) {
            Storage::disk('public')->delete($user->profile_photo);
        }

        $user->delete();

        return redirect('/')->with('success', 'Account deleted successfully.');
    }
}
