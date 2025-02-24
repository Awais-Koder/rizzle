<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class HospitalBranchResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     */
    public function toArray(Request $request): array
    {
        return [
            'id' => $this->id,
            'hospital_id' => $this->hospital_id,
            'city_id' => $this->city_id,
            'doctor_id' => $this->doctor_id,
            'type' => $this->type,
            'name' => $this->name,
            'phone_number' => $this->phone_number,
            'time' => $this->time,
            'address' => $this->address,
            'whatsapp_number' => $this->whatsapp_number,
            'discount' => $this->discount,
            'latitude' => $this->latitude,
            'longitude' => $this->longitude,
            'facilities' => $this->facilities,
            'image' => $this->image,
            'images' => $this->images,
            'ad_tag' => $this->ad_tag,
        ];
    }
}
