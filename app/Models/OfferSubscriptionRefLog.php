<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OfferSubscriptionRefLog extends Model
{
    /** @use HasFactory<\Database\Factories\OfferSubscriptionRefLogFactory> */
    use HasFactory;

    protected $table = 'offer_subscription_ref_logs';

    protected $fillable = [
        'offer_subscription_id',
    ];

    public function offer_subscription()
    {
        return $this->belongsTo(OfferSubscription::class);
    }
}
