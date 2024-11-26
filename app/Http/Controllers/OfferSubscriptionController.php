<?php

namespace App\Http\Controllers;

use App\Models\OfferSubscription;
use Barryvdh\Debugbar\Facades\Debugbar;
use Barryvdh\Debugbar\Twig\Extension\Debug;
use Illuminate\Http\Request;
use Inertia\Inertia;
use Illuminate\Support\Facades\Auth;

class OfferSubscriptionController extends Controller
{
    public function index()
    {
        try {
            $user = Auth::user()->load('role');
            $subscriptions = OfferSubscription::where('webmaster_id', '=', $user->id)->with('offer')->get();
            return Inertia::render('Offer/Subscription/Index', ['subscriptions' => $subscriptions]);
        } catch(\Exception $e) {
            Debugbar::error($e);
        }
    }
}
