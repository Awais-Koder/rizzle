<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Fashion extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'city_id',
        'name',
        'type',
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
        'time' => 'array',
        'images' => 'array',
        'ad_tag' => 'boolean',
    ];

    public function fashionBranches(): HasMany
    {
        return $this->hasMany(FashionBranch::class);
    }

    public function city(): BelongsTo
    {
        return $this->belongsTo(City::class);
    }
}
