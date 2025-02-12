<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class ShopResource extends JsonResource
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
            'image' => $this->image,
            'product_name' => $this->product_name,
            'old_price' => $this->old_price,
            'new_price' => $this->new_price,
            'images' => $this->images,
            'ad_tag' => $this->ad_tag,
            'shopBranches' => ShopBranchCollection::make($this->whenLoaded('shopBranches')),
        ];
    }
}
