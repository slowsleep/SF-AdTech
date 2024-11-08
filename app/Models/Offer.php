<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Offer extends Model
{
    use HasFactory;

    protected $fillable = [
        'advertiser_id',
        'title',
        'price',
        'url',
        'theme_id',
        'active',
    ];

    public function advertiser()
    {
        return $this->belongsTo(Advertiser::class, 'advertiser_id', 'user_id');
    }

    public function theme()
    {
        return $this->belongsTo(SiteTheme::class, 'theme_id', 'id');
    }
}
