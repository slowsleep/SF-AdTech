<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Inertia\Inertia;
use App\Models\Offer;
use App\Models\OfferSubscription;
use App\Models\OfferSubScriptionRefError;
use App\Models\OfferSubscriptionRefLog;
use Barryvdh\Debugbar\Facades\Debugbar;

class IndexController extends Controller
{
    public function index()
    {
        $offers = Offer::with('advertiser', 'theme', 'subscriptions', 'subscriptions.ref_log')->get();

        // subscription_id, offer_id, offer_title, offer_price, subscription_ref_log_count
        $offerPriceRefs = OfferSubscription::select('offer_subscriptions.id', 'offer_subscriptions.offer_id', 'offers.title', 'offers.price')->join('offers', 'offer_subscriptions.offer_id', '=', 'offers.id')->withCount('ref_log')->get();

        $count_ref = OfferSubscription::count();
        $redirects = OfferSubscriptionRefLog::count();
        $rejections = OfferSubScriptionRefError::count();

        $statistics = [
            'count_ref' => $count_ref,
            'redirects' => $redirects,
            'rejections' => $rejections,
        ];

        Debugbar::info($offerPriceRefs);
        Debugbar::info($statistics);

        return Inertia::render('Admin/Index', compact('offerPriceRefs', 'statistics'));
    }
}
