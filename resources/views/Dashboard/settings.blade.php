@extends('layouts.app')

@section('content')
<div class="min-h-screen flex bg-gray-50">

    <!-- LEFT SIDEBAR -->
    <aside class="w-64 bg-white shadow-lg p-6 space-y-6">
        <h2 class="text-xl font-semibold text-gray-800">User Dashboard</h2>

        <nav class="space-y-3">
            <a href="{{ route('dashboard') }}" class="flex items-center p-3 rounded-lg hover:bg-gray-100">
                🏠 <span class="ml-2">Dashboard</span>
            </a>

            <a href="{{ route('dashboard.favorites') }}" class="flex items-center p-3 rounded-lg hover:bg-gray-100">
                💚 <span class="ml-2">My Favorites</span>
            </a>

            <a href="{{ route('dashboard.orders') }}" class="flex items-center p-3 rounded-lg hover:bg-gray-100">
                🛒 <span class="ml-2">My Orders</span>
            </a>

            <a href="{{ route('dashboard.settings') }}" class="flex items-center p-3 rounded-lg bg-blue-100 hover:bg-blue-200">
                ⚙️ <span class="ml-2">Account Settings</span>
            </a>
        </nav>
    </aside>

    <!-- MAIN CONTENT -->
    <main class="flex-1 p-10">

        <div class="bg-white shadow-xl rounded-lg p-6 space-y-10">

            <h2 class="text-2xl font-semibold text-gray-800">⚙️ Account Settings</h2>

            @php $user = Auth::user(); @endphp

            <!-- PROFILE PHOTO -->
            <section>
                <h3 class="text-lg font-semibold text-gray-700 mb-3">Profile</h3>

                <div class="flex items-center space-x-6">

                    @if ($user->profile_photo)
                        <img src="{{ asset('storage/' . $user->profile_photo) }}"
                             class="w-20 h-20 rounded-full object-cover shadow">
                    @else
                        <div class="w-20 h-20 flex items-center justify-center rounded-full bg-gray-200 text-3xl font-bold text-gray-700 shadow">
                            {{ strtoupper(substr($user->name, 0, 1)) }}
                        </div>
                    @endif

                    <form action="{{ route('settings.updatePhoto') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <label class="block">
                            <span class="text-gray-700">Change profile photo</span>
                            <input type="file" name="photo" class="mt-2 block w-full">
                        </label>

                        <button class="mt-3 bg-blue-600 text-white px-4 py-2 rounded-lg hover:bg-blue-700">
                            Upload
                        </button>
                    </form>

                </div>
            </section>

            <!-- ACCOUNT INFO -->
            <section>
                <h3 class="text-lg font-semibold text-gray-700 mb-3">Account Information</h3>

                <form action="{{ route('settings.updateInfo') }}" method="POST" class="space-y-4">
                    @csrf

                    <div>
                        <label class="block text-gray-700">Name</label>
                        <input type="text" name="name" value="{{ $user->name }}"
                               class="w-full mt-1 p-2 border rounded-lg">
                    </div>

                    <div>
                        <label class="block text-gray-700">Email</label>
                        <input type="email" name="email" value="{{ $user->email }}"
                               class="w-full mt-1 p-2 border rounded-lg">
                    </div>

                    <button class="bg-green-600 text-white px-4 py-2 rounded-lg hover:bg-green-700">
                        Save Changes
                    </button>
                </form>
            </section>

            <!-- CHANGE PASSWORD -->
            <section>
                <h3 class="text-lg font-semibold text-gray-700 mb-3">Change Password</h3>

                <form action="{{ route('settings.updatePassword') }}" method="POST" class="space-y-4">
                    @csrf

                    <div>
                        <label class="block text-gray-700">Current Password</label>
                        <input type="password" name="current_password"
                               class="w-full mt-1 p-2 border rounded-lg">
                    </div>

                    <div>
                        <label class="block text-gray-700">New Password</label>
                        <input type="password" name="new_password"
                               class="w-full mt-1 p-2 border rounded-lg">
                    </div>

                    <button class="bg-yellow-500 text-white px-4 py-2 rounded-lg hover:bg-yellow-600">
                        Update Password
                    </button>
                </form>
            </section>

            <!-- DARK MODE -->
            <section>
                <h3 class="text-lg font-semibold text-gray-700 mb-3">Appearance</h3>

                <button onclick="toggleTheme()"
                        class="bg-gray-800 text-white px-4 py-2 rounded-lg hover:bg-black">
                    🌙 Toggle Dark / Light Mode
                </button>
            </section>

            <!-- DELETE ACCOUNT -->
            <section>
                <h3 class="text-lg font-semibold text-red-600 mb-3">Danger Zone</h3>

                <form action="{{ route('settings.deleteAccount') }}" method="POST"
                      onsubmit="return confirm('Are you sure you want to delete your account?');">
                    @csrf

                    <button class="bg-red-600 text-white px-4 py-2 rounded-lg hover:bg-red-700">
                        Delete My Account
                    </button>
                </form>
            </section>

        </div>

    </main>
</div>
@endsection
