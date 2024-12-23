<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SiteTheme extends Model
{
    use HasFactory;
    
    protected $table = 'site_themes';

    protected $fillable = [
        'name',
    ];
}
