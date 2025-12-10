<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\UserDashboardController;
use App\Http\Controllers\MessageController;
use App\Http\Controllers\SettingsController;
use App\Http\Controllers\UserSettingsController;
use App\Http\Controllers\CategoryController;

/*
|--------------------------------------------------------------------------
| PUBLIC ROUTE
|--------------------------------------------------------------------------
*/
Route::get('/', function () {
    return view('welcome');
})->name('home');


/*
|--------------------------------------------------------------------------
| AUTHENTICATED USER ROUTES
|--------------------------------------------------------------------------
*/
Route::middleware(['auth', 'verified'])->group(function () {

    /*
    |--------------------------------------------------------------------------
    | USER DASHBOARD
    |--------------------------------------------------------------------------
    */
    Route::get('/dashboard', [UserDashboardController::class, 'index'])
        ->name('dashboard');

    Route::get('/dashboard/orders', [UserDashboardController::class, 'orders'])
        ->name('dashboard.orders');

    Route::get('/dashboard/favorites', [UserDashboardController::class, 'favorites'])
        ->name('dashboard.favorites');

    Route::get('/dashboard/plants', [UserDashboardController::class, 'plants'])
        ->name('dashboard.plants');

    Route::get('/dashboard/settings', [UserDashboardController::class, 'settings'])
        ->name('dashboard.settings');


    /*
    |--------------------------------------------------------------------------
    | CATEGORY PAGE (NEW)
    |--------------------------------------------------------------------------
    */
    Route::get('/categories/{category:slug}', [CategoryController::class, 'show'])
        ->name('categories.show');


    /*
    |--------------------------------------------------------------------------
    | ACCOUNT SETTINGS — SettingsController
    |--------------------------------------------------------------------------
    */
    Route::post('/settings/photo', [SettingsController::class, 'updatePhoto'])
        ->name('settings.updatePhoto');

    Route::post('/settings/info', [SettingsController::class, 'updateInfo'])
        ->name('settings.updateInfo');

    Route::post('/settings/password/update', [SettingsController::class, 'updatePassword'])
        ->name('settings.updatePassword');

    Route::post('/settings/delete', [SettingsController::class, 'deleteAccount'])
        ->name('settings.deleteAccount');


    /*
    |--------------------------------------------------------------------------
    | USER PROFILE — UserSettingsController
    |--------------------------------------------------------------------------
    */
    Route::get('/settings/profile', [UserSettingsController::class, 'edit'])
        ->name('user.settings');

    Route::post('/settings/profile/update', [UserSettingsController::class, 'update'])
        ->name('user.settings.update');

    Route::post('/settings/profile/password/update', [UserSettingsController::class, 'updatePassword'])
        ->name('user.settings.password');


    /*
    |--------------------------------------------------------------------------
    | USER MESSAGES
    |--------------------------------------------------------------------------
    */
    Route::prefix('messages')->group(function () {
        Route::get('/', [MessageController::class, 'index'])->name('messages.index');
        Route::get('/create', [MessageController::class, 'create'])->name('messages.create');
        Route::post('/', [MessageController::class, 'store'])->name('messages.store');
    });


    /*
    |--------------------------------------------------------------------------
    | PROFILE ROUTES
    |--------------------------------------------------------------------------
    */
    Route::get('/profile', [ProfileController::class, 'edit'])
        ->name('profile.edit');

    Route::patch('/profile', [ProfileController::class, 'update'])
        ->name('profile.update');

    Route::delete('/profile', [ProfileController::class, 'destroy'])
        ->name('profile.destroy');
});


/*
|--------------------------------------------------------------------------
| ADMIN ROUTES
|--------------------------------------------------------------------------
*/
Route::middleware(['auth', 'admin'])
    ->prefix('admin')
    ->group(function () {

        Route::get('/', [AdminController::class, 'index'])->name('admin.dashboard');
        Route::get('/users', [AdminController::class, 'users'])->name('admin.users');
        Route::get('/products', [AdminController::class, 'products'])->name('admin.products');
        Route::get('/orders', [AdminController::class, 'orders'])->name('admin.orders');
    });


/*
|--------------------------------------------------------------------------
| AUTH ROUTES
|--------------------------------------------------------------------------
*/
require __DIR__ . '/auth.php';
