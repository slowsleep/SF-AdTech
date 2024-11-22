<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Offer;
use Barryvdh\Debugbar\Facades\Debugbar;

class OfferController extends Controller
{
    public function store(Request $request)
    {
        try {
            $request->validate([
                'title' => 'required|string|max:255',
                'price' => 'required|numeric|between:0.00,99.99|min:0',
                'url' => 'required|url',
                'theme_id' => 'required|exists:site_themes,id',
            ]);

            $offer = new Offer();
            $offer->advertiser_id = $request->user()->id;
            $offer->title = $request->title;
            $offer->price = $request->price;
            $offer->url = $request->url;
            $offer->theme_id = $request->theme_id;
            $offer->save();

            $response = [
                'error' => false,
                'message' => 'Offer created successfully',
            ];

            return response()->json($response, 200);
        } catch (\Exception $e) {
            Debugbar::error($e);

            $response = [
                'error' => true,
                'message' => $e->getMessage(),
            ];
            
            return response()->json($response, 500);
        }

    }
}
