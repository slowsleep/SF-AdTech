<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\OfferSubscription;
use App\Models\OfferSubscriptionRefLog;
use Barryvdh\Debugbar\Facades\Debugbar;
use Illuminate\Http\Request;

class OfferSubscriptionRefController extends Controller
{
    public function index(string $ref_uuid)
    {
        $subscription = OfferSubscription::where('ref_link_uuid', '=', $ref_uuid)->with('offer')->firstOrFail();

        if (!$subscription) {
            abort(404);
        }

        OfferSubscriptionRefLog::create([
            'offer_subscription_id' => $subscription->id,
        ]);

        Debugbar::info($subscription->offer->url);

        return redirect($subscription->offer->url);
    }
}
