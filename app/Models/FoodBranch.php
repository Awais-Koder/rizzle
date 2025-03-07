<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class FoodBranch extends Model
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
        'food_id' => 'integer',
        'city_id' => 'integer',
        'latitude' => 'float',
        'longitude' => 'float',
        'images' => 'array',
        'ad_tag' => 'boolean',
    ];

    public function food(): BelongsTo
    {
        return $this->belongsTo(Food::class);
    }
    public function foodCategory(): BelongsTo
    {
        return $this->belongsTo(FoodCategory::class);
    }
    public function city(): BelongsTo
    {
        return $this->belongsTo(City::class);
    }

    public static function booted()
    {
        if (request()->is('admin/*')) {
            return;
        }
        static::addGlobalScope('city', function ($query) {
            $cityId = request()->header('City-Id');

            // Apply the filter only if City-Id header is present
            if (!empty($cityId)) {
                $query->where('city_id', $cityId);
            }
        });
    }
}
