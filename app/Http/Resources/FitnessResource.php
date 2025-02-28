<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class FitnessResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     */
    public function toArray(Request $request): array
    {
        return [
            'id' => $this->id,
            'city_id' => $this->city_id,
            'name' => $this->name,
            'phone_number' => $this->phone_number,
            'time' => $this->time,
            'address' => $this->address,
            'whatsapp_number' => $this->whatsapp_number,
            'discount' => $this->discount,
            'discount_type' => $this->discount_type,
            'latitude' => $this->latitude,
            'longitude' => $this->longitude,
            'images' => $this->images,
            'image' => $this->image,
            'ad_tag' => $this->ad_tag,
            'fitnessBranches' => FitnessBranchCollection::make($this->whenLoaded('fitnessBranches')),
        ];
    }
}
