<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\OfferController;
use App\Http\Controllers\Api\OfferSubscriptionController;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

Route::group(['middleware' => ['web', 'advertiser', 'auth:sanctum']], function () {
    Route::post('offers/create', [OfferController::class, 'store'])->name('api.offers.store');
    Route::patch('offers/edit/{id?}', [OfferController::class, 'update'])->name('api.offers.update');
    Route::delete('offers/{id?}', [OfferController::class, 'destroy'])
    ->where('id', '[0-9]+')
    ->name('api.offers.destroy');
});

Route::group(['middleware' => ['web', 'webmaster', 'auth:sanctum']], function(){
    Route::post('offers/subscriptions', [OfferSubscriptionController::class, 'store'])->name('api.offers.subscriptions.store');
    Route::delete('offers/subscriptions/{id?}', [OfferSubscriptionController::class, 'destroy'])->name('api.offers.subscriptions.destroy');
});

Route::get('offers/subscriptions/{id?}/statistics', [OfferSubscriptionController::class, 'statistics'])->name('api.offers.subscriptions.statistics')->middleware(['web', 'auth:sanctum']);
