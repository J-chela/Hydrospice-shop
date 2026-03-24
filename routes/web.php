<?php

use Illuminate\Support\Facades\Route;
use App\Models\Product;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\UserDashboardController;
use App\Http\Controllers\MessageController;
use App\Http\Controllers\SettingsController;
use App\Http\Controllers\UserSettingsController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\Admin\AdminMessageController; // <-- NEW

/*
|--------------------------------------------------------------------------
| PUBLIC ROUTES
|--------------------------------------------------------------------------
*/

// Home
Route::get('/', function () {
    $featuredFallback = false;

    try {
        $featuredProducts = Product::query()
            ->whereNotNull('slug')
            ->latest()
            ->take(3)
            ->get();
    } catch (\Throwable $e) {
        // Keep the landing page available even when the DB driver/service is down.
        $featuredFallback = true;
        $featuredProducts = collect([
            (object) [
                'name' => 'Hydroponic Starter Kit',
                'description' => 'A complete entry kit with nutrient support, optimized for beginners.',
                'slug' => null,
                'image' => 'https://images.unsplash.com/photo-1464226184884-fa280b87c399?auto=format&fit=crop&w=900&q=70',
            ],
            (object) [
                'name' => 'Herb Seedling Pack',
                'description' => 'Fresh, healthy seedlings selected for flavor, durability, and strong growth.',
                'slug' => null,
                'image' => 'https://images.unsplash.com/photo-1461354464878-ad92f492a5a0?auto=format&fit=crop&w=900&q=70',
            ],
            (object) [
                'name' => 'Signature Spice Collection',
                'description' => 'Curated everyday spices with rich aroma and dependable quality.',
                'slug' => null,
                'image' => 'https://images.unsplash.com/photo-1596040033229-a9821ebd058d?auto=format&fit=crop&w=900&q=70',
            ],
        ]);
    }

    return view('welcome', compact('featuredProducts', 'featuredFallback'));
})->name('home');

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
    Route::post('/favorites/toggle/{id}', [UserDashboardController::class, 'toggleFavorite'])
        ->name('favorites.toggle');

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

        /*
        |--------------------------------------------------------------------------
        | PRODUCT MANAGEMENT (ADMIN)
        |--------------------------------------------------------------------------
        */
        Route::prefix('products')->group(function () {

            Route::get('/', [ProductController::class, 'index'])
                ->name('admin.products.index');

            Route::get('/create', [ProductController::class, 'create'])
                ->name('admin.products.create');

            Route::post('/', [ProductController::class, 'store'])
                ->name('admin.products.store');

            Route::get('/{product}/edit', [ProductController::class, 'edit'])
                ->name('admin.products.edit');

            Route::put('/{product}', [ProductController::class, 'update'])
                ->name('admin.products.update');

            Route::delete('/{product}', [ProductController::class, 'destroy'])
                ->name('admin.products.destroy');
        });

        /*
        |--------------------------------------------------------------------------
        | ADMIN MESSAGES
        |--------------------------------------------------------------------------
        */
        Route::prefix('messages')->group(function () {
            Route::get('/', [AdminMessageController::class, 'index'])->name('admin.messages.index'); // list messages
            Route::get('/{id}', [AdminMessageController::class, 'show'])->name('admin.messages.show'); // view single
            Route::post('/reply/{id}', [AdminMessageController::class, 'reply'])->name('admin.messages.reply'); // reply
        });

    });

/*
|--------------------------------------------------------------------------
| AUTH ROUTES
|--------------------------------------------------------------------------
*/
require __DIR__ . '/auth.php';
