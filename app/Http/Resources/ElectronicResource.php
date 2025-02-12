<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class ElectronicResource extends JsonResource
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
            'latitude' => $this->latitude,
            'longitude' => $this->longitude,
            'image' => $this->image,
            'images' => $this->images,
            'ad_tag' => $this->ad_tag,
            'electronicBranches' => ElectronicBranchCollection::make($this->whenLoaded('electronicBranches')),
        ];
    }
}
