<?php

namespace App\Http\Controllers;

use App\Models\Advertiser;
use Inertia\Inertia;
use App\Models\SiteTheme;
use App\Models\Offer;
use Auth;
use Barryvdh\Debugbar\Facades\Debugbar;
use App\Models\OfferSubscription;

class OfferController extends Controller
{
    /**
     * Display user's offers
     */
    public function index()
    {
        $user = Auth::user()->load('role');

        if ($user->role->name === 'advertiser') {
            $advertiser = Advertiser::where('user_id', $user->id)->first();
            $offers = Offer::where('advertiser_id', '=', $user->id)
            ->with('theme')
            ->withCount('subscriptions')
            ->get();
            $props = compact('offers');
        } else {
            $offers = Offer::all()->load('theme', 'advertiser');
            $subscriptions = OfferSubscription::where('webmaster_id', $user->id)->pluck('offer_id')->toArray();
            $props = compact('offers', 'subscriptions');
        }

        return Inertia::render('Offer/Index', $props);
    }

    public function create()
    {
        return Inertia::render('Offer/Create', [
            'themes' => SiteTheme::all(),
        ]);
    }

    public function show($id)
    {
        if (Auth::user()->role->name === 'advertiser') {
            $offer = Offer::with('theme', 'advertiser', 'subscriptions', 'subscriptions.ref_log')->find($id);
        } else if(Auth::user()->role->name === 'webmaster') {
            $offer = Offer::with('theme', 'advertiser')->find($id);
            $subscription = OfferSubscription::where('offer_id', $offer->id)->where('webmaster_id', Auth::user()->id)->with('ref_log')->get();
            $offer['subscription'] = $subscription;
        }

        return Inertia::render('Offer/Show', [
            'offer' => $offer,
        ]);
    }

    public function edit($id)
    {
        $offer = Offer::with('theme')->find($id);

        return Inertia::render('Offer/Edit', [
            'offer' => $offer,
            'themes' => SiteTheme::all(),
        ]);
    }
}
