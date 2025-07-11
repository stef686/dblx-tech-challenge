<?php

use App\Http\Controllers\Admin\ItemsController;
use App\Http\Controllers\AdminDashboardController;
use App\Http\Controllers\DashboardController;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;

Route::get('/', function () {
    return Inertia::render('Welcome');
})->name('home');

Route::group(['middleware' => ['auth', 'verified']], function () {
    Route::get('dashboard', DashboardController::class)
        ->name('dashboard');

    Route::post('dashboard', [DashboardController::class, 'search']);

    Route::get('admin/dashboard', AdminDashboardController::class)
        ->name('admin.dashboard');

    Route::get('admin/items', [ItemsController::class, 'index'])
        ->name('admin.items.index')
        ->middleware(['can:viewAny,App\Models\Item']);

    Route::group(['middleware' => ['can:create,App\Models\Item']], function () {
        Route::get('admin/items/create', [ItemsController::class, 'create'])
            ->name('admin.items.create');

        Route::post('admin/items', [ItemsController::class, 'store']);
    });

    Route::group(['middleware' => ['can:update,item']], function () {
        Route::get('admin/items/{item}/edit', [ItemsController::class, 'edit'])
            ->name('admin.items.edit');

        Route::patch('admin/items/{item}', [ItemsController::class, 'update']);
    });
});

require __DIR__.'/settings.php';
require __DIR__.'/auth.php';
