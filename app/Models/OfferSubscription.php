<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use App\Models\Offer;
use App\Models\Webmaster;

class OfferSubscription extends Model
{
    use HasFactory;

    protected $table = 'offer_subscriptions';

    protected $fillable = [
        'webmaster_id',
        'offer_id',
        'is_subscribed',
        'ref_link'
    ];

    public function webmaster()
    {
        return $this->belongsTo(Webmaster::class, 'webmaster_id', 'user_id');
    }

    public function offer()
    {
        return $this->belongsTo(Offer::class);
    }
}
