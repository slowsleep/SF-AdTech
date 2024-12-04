<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class OfferSubscriptionRefError extends Model
{
    protected $table = 'offer_subscription_ref_errors';

    protected $fillable = [
        'ref_link_uuid',
        'from',
    ];
}
