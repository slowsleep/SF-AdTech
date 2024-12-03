<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;
use App\Http\Controllers\IndexController;
use App\Http\Controllers\Admin\IndexController as AdminIndexController;
use App\Http\Controllers\Admin\UserController as AdminUserController;
use App\Http\Controllers\OfferController;
use App\Http\Controllers\OfferSubscriptionController;
use App\Http\Controllers\OfferSubscriptionRefController;

Route::get('/', function () {
    return Inertia::render('Welcome', [
        'canLogin' => Route::has('login'),
        'canRegister' => Route::has('register'),
        'laravelVersion' => Application::VERSION,
        'phpVersion' => PHP_VERSION,
    ]);
});

Route::group(['middleware' => ['auth']], function () {
    Route::get('/dashboard', function () {
        return Inertia::render('Dashboard');
    })->middleware(['verified'])->name('dashboard');

    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    Route::get('/offers', [OfferController::class, 'index'])->name('offers.index');
    Route::get('/offers/{id?}', [OfferController::class, 'show'])
    ->where('id', '[0-9]+')
    ->name('offers.show');

    Route::group(['middleware' => ['advertiser']], function () {
        Route::get('/offers/create', [OfferController::class, 'create'])->name('offers.create');
        Route::get('/offers/edit/{id?}', [OfferController::class, 'edit'])->name('offers.edit');
    });

    Route::group(['middleware' => ['webmaster']], function() {
        Route::get('/offers/subscriptions', [OfferSubscriptionController::class, 'index'])->name('offers.subscriptions.index');
    });

    Route::group(['middleware' => ['admin'], 'prefix' => 'admin'], function () {
        Route::get('/', [AdminIndexController::class, 'index'])->name('admin.index');
        Route::get('/users/all/{role?}', [AdminUserController::class, 'index'])->name('admin.users.index');
        Route::get('/users/create', [AdminUserController::class, 'create'])->name('admin.users.create');
        Route::post('/users', [AdminUserController::class, 'store'])->name('admin.users.store');
    });
});

require __DIR__.'/auth.php';

Route::get('test', [IndexController::class, 'index']);

Route::get('/r/{ref_uuid}', [OfferSubscriptionRefController::class, 'index']);
