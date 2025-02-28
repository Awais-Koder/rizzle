<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class DoctorResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     */
    public function toArray(Request $request): array
    {
        return [
            'id' => $this->id,
            'city_id' => $this->city_id,
            'doctor_category_id' => $this->doctor_category_id,
            'fees' => $this->fees,
            'name' => $this->name,
            'reviews' => $this->reviews,
            'short_description' => $this->short_description,
            'about_me' => $this->about_me,
            'experience' => $this->experience,
            'schedule' => $this->schedule,
            'address' => $this->address,
            'whatsapp' => $this->whatsapp,
            'phone' => $this->phone,
            'image' => $this->image,
            'latitude' => $this->latitude,
            'longitude' => $this->longitude,
            'video_youtube_link' => $this->video_youtube_link,
            'ad_tag' => $this->ad_tag,
        ];
    }
}
