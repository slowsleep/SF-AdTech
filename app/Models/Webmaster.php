<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Webmaster extends Model
{
    use HasFactory;

    protected $fillable = [
        'site'
    ];

    public function offers()
    {
        return $this->hasMany(Offer::class);
    }
}
