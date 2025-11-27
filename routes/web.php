<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\UserDashboardController;
use App\Http\Controllers\MessageController;
use App\Http\Controllers\SettingsController;
use App\Http\Controllers\UserSettingsController; // ✅ ADD THIS

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
| All web routes for your HydroSpice Shop app.
|
*/

// 🏠 Public homepage
Route::get('/', function () {
    return view('welcome');
})->name('home');


// 👤 Authenticated user routes
Route::middleware(['auth', 'verified'])->group(function () {

    // 🌿 Main User Dashboard
    Route::get('/dashboard', [UserDashboardController::class, 'index'])
        ->name('dashboard');

    // 🌿 Dashboard sections
    Route::get('/dashboard/orders', [UserDashboardController::class, 'orders'])
        ->name('dashboard.orders');

    // 🌿 Existing SettingsController (DO NOT REMOVE)
    Route::get('/dashboard/settings', [SettingsController::class, 'index'])
        ->name('dashboard.settings');

    Route::post('/dashboard/settings/theme', [SettingsController::class, 'toggleTheme'])
        ->name('settings.theme');

    Route::post('/dashboard/settings/profile', [SettingsController::class, 'updateProfile'])
        ->name('settings.profile');

    Route::post('/dashboard/settings/password', [SettingsController::class, 'updatePassword'])
        ->name('settings.password');



    /*
    |--------------------------------------------------------------------------
    | ✅ NEW: USER PROFILE SETTINGS ROUTES
    |--------------------------------------------------------------------------
    | These handle editing name, email, phone, password (UserSettingsController)
    */
    Route::get('/dashboard/settings/profile/info', [UserSettingsController::class, 'edit'])
        ->name('user.settings');

    Route::post('/dashboard/settings/profile/info/update', [UserSettingsController::class, 'update'])
        ->name('user.settings.update');

    Route::post('/dashboard/settings/profile/password/update', [UserSettingsController::class, 'updatePassword'])
        ->name('user.settings.password');



    // 🌿 Favorites section
    Route::get('/dashboard/favorites', [UserDashboardController::class, 'favorites'])
        ->name('dashboard.favorites');

    // 💬 User Messages
    Route::prefix('dashboard/messages')->group(function () {
        Route::get('/', [MessageController::class, 'index'])->name('dashboard.messages.index');
        Route::get('/create', [MessageController::class, 'create'])->name('dashboard.messages.create');
        Route::post('/', [MessageController::class, 'store'])->name('dashboard.messages.store');
    });

    // 🧩 Profile routes
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});


// 👑 Admin-only routes
Route::middleware(['auth', 'admin'])->prefix('admin')->group(function () {
    Route::get('/', [AdminController::class, 'index'])->name('admin.dashboard');

    Route::get('/users', [AdminController::class, 'users'])->name('admin.users');
    Route::get('/products', [AdminController::class, 'products'])->name('admin.products');
    Route::get('/orders', [AdminController::class, 'orders'])->name('admin.orders');
});


// 🔐 Authentication routes (login/register/logout)
require __DIR__ . '/auth.php';


