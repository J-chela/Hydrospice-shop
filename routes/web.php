<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\UserDashboardController;
use App\Http\Controllers\MessageController;
use App\Http\Controllers\SettingsController;
use App\Http\Controllers\UserSettingsController;


// 🏠 Public homepage
Route::get('/', function () {
    return view('welcome');
})->name('home');


// 👤 Authenticated user routes
Route::middleware(['auth', 'verified'])->group(function () {

    /*
    |--------------------------------------------------------------------------
    | USER DASHBOARD
    |--------------------------------------------------------------------------
    */
    Route::get('/dashboard', [UserDashboardController::class, 'index'])->name('dashboard');
    Route::get('/dashboard/orders', [UserDashboardController::class, 'orders'])->name('dashboard.orders');
    Route::get('/dashboard/favorites', [UserDashboardController::class, 'favorites'])->name('dashboard.favorites');


    /*
    |--------------------------------------------------------------------------
    | SETTINGS (SettingsController)
    |--------------------------------------------------------------------------
    */
    Route::get('/dashboard/settings', [SettingsController::class, 'index'])
        ->name('dashboard.settings');

    // Theme Toggle
    Route::post('/dashboard/settings/theme', [SettingsController::class, 'toggleTheme'])
        ->name('settings.theme');

    // ⭐ Update Profile Photo
    Route::post('/dashboard/settings/photo', [SettingsController::class, 'updatePhoto'])
        ->name('settings.updatePhoto');

    // Update Name + Email
    Route::post('/dashboard/settings/info', [SettingsController::class, 'updateInfo'])
        ->name('settings.updateInfo');

    // Update Password
    Route::post('/dashboard/settings/password/update', [SettingsController::class, 'updatePassword'])
        ->name('settings.updatePassword');

    // Delete Account
    Route::post('/dashboard/settings/delete', [SettingsController::class, 'deleteAccount'])
        ->name('settings.deleteAccount');


    /*
    |--------------------------------------------------------------------------
    | USER PROFILE (UserSettingsController)
    |--------------------------------------------------------------------------
    */
    Route::get('/dashboard/settings/profile/info', [UserSettingsController::class, 'edit'])
        ->name('user.settings');

    Route::post('/dashboard/settings/profile/info/update', [UserSettingsController::class, 'update'])
        ->name('user.settings.update');

    Route::post('/dashboard/settings/profile/password/update', [UserSettingsController::class, 'updatePassword'])
        ->name('user.settings.password');


    /*
    |--------------------------------------------------------------------------
    | USER MESSAGES
    |--------------------------------------------------------------------------
    */
    Route::prefix('dashboard/messages')->group(function () {
        Route::get('/', [MessageController::class, 'index'])->name('dashboard.messages.index');
        Route::get('/create', [MessageController::class, 'create'])->name('dashboard.messages.create');
        Route::post('/', [MessageController::class, 'store'])->name('dashboard.messages.store');
    });


    /*
    |--------------------------------------------------------------------------
    | PROFILE ROUTES
    |--------------------------------------------------------------------------
    */
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});


// 👑 Admin-only routes
Route::middleware(['auth', 'admin'])
    ->prefix('admin')
    ->group(function () {

        Route::get('/', [AdminController::class, 'index'])->name('admin.dashboard');
        Route::get('/users', [AdminController::class, 'users'])->name('admin.users');
        Route::get('/products', [AdminController::class, 'products'])->name('admin.products');
        Route::get('/orders', [AdminController::class, 'orders'])->name('admin.orders');
    });


// 🔐 Authentication routes
require __DIR__ . '/auth.php';
