<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\UserDashboardController;
use App\Http\Controllers\MessageController;
use App\Http\Controllers\SettingsController;
use App\Http\Controllers\UserSettingsController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ProductController;

/*
|--------------------------------------------------------------------------
| PUBLIC ROUTES
|--------------------------------------------------------------------------
*/

// Home
Route::view('/', 'welcome')->name('home');

// Product Details
Route::get('/product/{slug}', [ProductController::class, 'show'])
    ->name('product.show');

// Category Page
Route::get('/categories/{category:slug}', [CategoryController::class, 'show'])
    ->name('categories.show');


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
    Route::prefix('dashboard')->group(function () {

        Route::get('/', [UserDashboardController::class, 'index'])
            ->name('dashboard');

        Route::get('/orders', [UserDashboardController::class, 'orders'])
            ->name('dashboard.orders');

        Route::get('/favorites', [UserDashboardController::class, 'favorites'])
            ->name('dashboard.favorites');

        Route::get('/plants', [UserDashboardController::class, 'plants'])
            ->name('dashboard.plants');

        Route::get('/settings', [UserDashboardController::class, 'settings'])
            ->name('dashboard.settings');
    });


    /*
    |--------------------------------------------------------------------------
    | FAVORITES ROUTES
    |--------------------------------------------------------------------------
    */

    // Toggle Favorite (Add/Remove)
    Route::post('/favorites/toggle/{id}', [UserDashboardController::class, 'toggleFavorite'])
        ->name('favorites.toggle');

    // If you want a direct list route (dashboard.favorites already exists):
    // Route::get('/favorites', [UserDashboardController::class, 'favorites'])
    //     ->name('favorites');


    /*
    |--------------------------------------------------------------------------
    | USER ACCOUNT SETTINGS
    |--------------------------------------------------------------------------
    */
    Route::prefix('settings')->group(function () {

        Route::post('/photo', [SettingsController::class, 'updatePhoto'])
            ->name('settings.updatePhoto');

        Route::post('/info', [SettingsController::class, 'updateInfo'])
            ->name('settings.updateInfo');

        Route::post('/password/update', [SettingsController::class, 'updatePassword'])
            ->name('settings.updatePassword');

        Route::post('/delete', [SettingsController::class, 'deleteAccount'])
            ->name('settings.deleteAccount');

        // User Profile
        Route::get('/profile', [UserSettingsController::class, 'edit'])
            ->name('user.settings');

        Route::post('/profile/update', [UserSettingsController::class, 'update'])
            ->name('user.settings.update');

        Route::post('/profile/password/update', [UserSettingsController::class, 'updatePassword'])
            ->name('user.settings.password');
    });


    /*
    |--------------------------------------------------------------------------
    | USER MESSAGES
    |--------------------------------------------------------------------------
    */
    Route::prefix('messages')->group(function () {

        Route::get('/', [MessageController::class, 'index'])
            ->name('messages.index');

        Route::get('/create', [MessageController::class, 'create'])
            ->name('messages.create');

        Route::post('/', [MessageController::class, 'store'])
            ->name('messages.store');
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

        /*
        |--------------------------------------------------------------------------
        | CATEGORY MANAGEMENT (ADMIN)
        |--------------------------------------------------------------------------
        */
        Route::prefix('categories')->group(function () {

            Route::get('/', [CategoryController::class, 'index'])
                ->name('admin.categories');

            Route::get('/create', [CategoryController::class, 'create'])
                ->name('admin.categories.create');

            Route::post('/', [CategoryController::class, 'store'])
                ->name('admin.categories.store');

            Route::get('/{category}/edit', [CategoryController::class, 'edit'])
                ->name('admin.categories.edit');

            Route::put('/{category}', [CategoryController::class, 'update'])
                ->name('admin.categories.update');

            Route::delete('/{category}', [CategoryController::class, 'destroy'])
                ->name('admin.categories.delete');
        });
    });


/*
|--------------------------------------------------------------------------
| AUTH ROUTES
|--------------------------------------------------------------------------
*/
require __DIR__ . '/auth.php';
