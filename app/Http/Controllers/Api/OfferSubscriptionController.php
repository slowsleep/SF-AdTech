<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\OfferSubscription;
use Barryvdh\Debugbar\Facades\Debugbar;
use Str;

class OfferSubscriptionController extends Controller
{
    public function store(Request $request)
    {
        $offer = new OfferSubscription();
        $offer->webmaster_id = $request->user()->id;
        $offer->offer_id = $request->offer_id;
        $offer->ref_link_uuid = Str::uuid();
        $offer->save();
        $response = ['error' => false, 'message' => 'Offer subscribed successfully'];

        return response()->json($response);
    }

    public function destroy(Request $request)
    {
        try {
            $offer = OfferSubscription::where('webmaster_id', '=', $request->user()->id)->where('offer_id', '=', $request->offer_id)->first();
            $offer->delete();
            $response = ['error' => false, 'message' => 'Offer unsubscribed successfully'];

            return response()->json($response);
        } catch (\Exception $e) {
            Debugbar::error($e);

            return response()->json(['error' => true, 'message' => 'Offer unsubscribed failed']);
        }
    }
}
