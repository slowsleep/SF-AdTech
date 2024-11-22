<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\OfferController;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

Route::group(['middleware' => ['web', 'advertiser', 'auth:sanctum']], function () {
    Route::post('offers/create', [OfferController::class, 'store'])->name('api.offers.store');
});
