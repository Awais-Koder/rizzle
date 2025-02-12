<?php

namespace App\Filament\Resources\AdvertisementResource\Pages;

use App\Filament\Resources\AdvertisementResource;
use Filament\Actions;
use Filament\Resources\Pages\CreateRecord;

class CreateAdvertisement extends CreateRecord
{
    protected function mutateFormDataBeforeCreate(array $data): array
    {
        $data['home_banner'] = json_encode($data['home_banner']);
        $data['sponsor_video'] = json_encode($data['sponsor_video']);
        $data['education_ad'] = json_encode($data['education_ad']);
        $data['travel_ad'] = json_encode($data['travel_ad']);
        $data['food_ad'] = json_encode($data['food_ad']);
        $data['shop_ad'] = json_encode($data['shop_ad']);
        // dd($data);
        return $data;
    }
    protected static string $resource = AdvertisementResource::class;
}
