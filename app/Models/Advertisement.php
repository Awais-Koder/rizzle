<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Advertisement extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $guarded = [];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'home_banner' => 'array',
        'sponsor_video' => 'array',
        'education_ad' => 'array',
        'travel_ad' => 'array',
        'food_ad' => 'array',
        'shop_ad' => 'array',
    ];
}
