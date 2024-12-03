<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\OfferSubscription;
use Barryvdh\Debugbar\Facades\Debugbar;
use Str;
use App\Models\OfferSubscriptionRefLog;
use Carbon\Carbon;

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

    public function statistics(Request $request, int $id)
    {
        try {
            if ($request->period == 'day') {
                $startOfDay = Carbon::now('GMT+3')->startOfDay()->timezone('GMT+0');
                $endOfDay = Carbon::now('GMT+3')->endOfDay()->timezone('GMT+0');
                $logs = OfferSubscriptionRefLog::where('offer_subscription_id', '=', $id)->whereBetween('created_at', [$startOfDay, $endOfDay])->orderBy('created_at')->get();
            } else if ($request->period == 'month') {
                $startOfMonth = Carbon::now('GMT+3')->startOfMonth()->timezone('GMT+0');
                $endOfMonth = Carbon::now('GMT+3')->endOfMonth()->timezone('GMT+0');
                $logs = OfferSubscriptionRefLog::where('offer_subscription_id', '=', $id)->whereBetween('created_at', [$startOfMonth, $endOfMonth])->orderBy('created_at')->get();
            } else if ($request->period == 'year') {
                $startOfYear = Carbon::now('GMT+3')->startOfYear()->timezone('GMT+0');
                $endOfYear = Carbon::now('GMT+3')->endOfYear()->timezone('GMT+0');
                $logs = OfferSubscriptionRefLog::where('offer_subscription_id', '=', $id)->whereBetween('created_at', [$startOfYear, $endOfYear])->orderBy('created_at')->get();
            }

            $response = ['error' => false, 'message' => 'Statistics', 'data' => $logs];

            return response()->json($response, 200);
        } catch(\Exception $e) {
            Debugbar::error($e);
            $response = ['error' => true, 'message' => $e];
            return response()->json($response, 500);
        }
    }

}
