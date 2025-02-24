<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class ElectronicBranch extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'city_id',
        'electronic_id',
        'name',
        'phone_number',
        'time',
        'address',
        'whatsapp_number',
        'discount',
        'latitude',
        'longitude',
        'image',
        'images',
        'ad_tag',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'city_id' => 'integer',
        'electronic_id' => 'integer',
        'time' => 'array',
        'images' => 'array',
        'ad_tag' => 'boolean',
    ];

    public function city(): BelongsTo
    {
        return $this->belongsTo(City::class);
    }

    public function electronic(): BelongsTo
    {
        return $this->belongsTo(Electronic::class);
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
