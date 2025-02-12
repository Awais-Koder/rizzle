<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class GovOfficeBranch extends Model
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
        'gov_office_id' => 'integer',
        'city_id' => 'integer',
        'start_time' => 'datetime',
        'end_time' => 'datetime',
        'images' => 'array',
        'ad_tag' => 'boolean',
    ];

    public function govOffice(): BelongsTo
    {
        return $this->belongsTo(GovOffice::class);
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
            // Check if `city_id` is passed in the request (e.g., header or query parameter)
            $cityId = request()->header('City-Id')
                ?? request()->query('city_id')
                ?? (auth('sanctum')->check() ? auth('sanctum')->user()->city_id : null);
            // Apply the `city_id` filter if available
            if ($cityId) {
                $query->where('city_id', $cityId);
            }
        });
    }
}
