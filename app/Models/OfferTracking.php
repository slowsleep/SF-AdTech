<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OfferTracking extends Model
{
    /** @use HasFactory<\Database\Factories\OfferTrackingFactory> */
    use HasFactory;

    protected $table = 'offer_tracking';

    protected $fillable = [
        'offer_subscription_id',
        'clicks',
    ];

    public function offer_subscription()
    {
        return $this->belongsTo(OfferSubscription::class);
    }
}
