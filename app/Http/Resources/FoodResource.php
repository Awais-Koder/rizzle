<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class FoodResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     */
    public function toArray(Request $request): array
    {
        return [
            'id' => $this->id,
            'city_id' => $this->city_id,
            'food_category_id' => $this->food_category_id,
            'name' => $this->name,
            'phone_number' => $this->phone_number,
            'start_time' => $this->start_time,
            'end_time' => $this->end_time,
            'address' => $this->address,
            'whatsapp_number' => $this->whatsapp_number,
            'discount' => $this->discount,
            'latitude' => $this->latitude,
            'longitude' => $this->longitude,
            'iamge' => $this->iamge,
            'images' => $this->images,
            'ad_tag' => $this->ad_tag,
            'foodBranches' => FoodBranchCollection::make($this->whenLoaded('foodBranches')),
        ];
    }
}
