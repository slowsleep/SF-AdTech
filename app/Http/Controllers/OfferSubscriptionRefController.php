<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\OfferSubscription;
use App\Models\OfferSubscriptionRefLog;
use Barryvdh\Debugbar\Facades\Debugbar;
use App\Models\Offer;
use App\Models\OfferSubscriptionRefError;

class OfferSubscriptionRefController extends Controller
{
    public function index(string $ref_uuid)
    {
        $subscription = OfferSubscription::where('ref_link_uuid', '=', $ref_uuid)->with('offer')->first();

        if (!$subscription) {
            OfferSubscriptionRefError::create([
                'ref_link_uuid' => $ref_uuid,
                'from' => $_SERVER['REMOTE_ADDR'],
            ]);
            Debugbar::info(OfferSubscriptionRefError::all());
            abort(404);
        }

        $offer = Offer::where('id', '=', $subscription->offer_id)->first();

        if (!$offer->active) {
            abort(404);
        }

        OfferSubscriptionRefLog::create([
            'offer_subscription_id' => $subscription->id,
        ]);

        Debugbar::info($subscription->offer->url);

        return redirect($subscription->offer->url);
    }
}
