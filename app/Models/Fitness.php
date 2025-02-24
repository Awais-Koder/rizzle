<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Fitness extends Model
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

    public function fitnessBranches(): HasMany
    {
        return $this->hasMany(FitnessBranch::class);
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
