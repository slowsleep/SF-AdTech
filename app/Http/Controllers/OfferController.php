<?php

namespace App\Http\Controllers;

use App\Models\Advertiser;
use Inertia\Inertia;
use App\Models\SiteTheme;
use App\Models\Offer;
use Auth;
use Barryvdh\Debugbar\Facades\Debugbar;

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
            $offers = Offer::where('advertiser_id', $advertiser->user_id)->with('theme')->get();
        } else {
            $offers = Offer::all()->load('theme', 'advertiser');
        }

        return Inertia::render('Offer/Index', ['offers' => $offers]);
    }

    public function create()
    {
        return Inertia::render('Offer/Create', [
            'themes' => SiteTheme::all(),
        ]);
    }
}
