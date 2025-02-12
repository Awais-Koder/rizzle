<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class FoodBranchResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     */
    public function toArray(Request $request): array
    {
        return [
            'id' => $this->id,
            'food_id' => $this->food_id,
            'city_id' => $this->city_id,
            'category' => $this->category,
            'name' => $this->name,
            'phone_number' => $this->phone_number,
            'time' => $this->time,
            'address' => $this->address,
            'whatsapp_number' => $this->whatsapp_number,
            'discount' => $this->discount,
            'latitude' => $this->latitude,
            'longitude' => $this->longitude,
            'iamge' => $this->iamge,
            'images' => $this->images,
            'ad_tag' => $this->ad_tag,
        ];
    }
}
