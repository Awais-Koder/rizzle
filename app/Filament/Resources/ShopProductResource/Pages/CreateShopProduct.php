<?php

namespace App\Filament\Resources\ShopProductResource\Pages;

use App\Filament\Resources\ShopProductResource;
use Filament\Actions;
use Filament\Resources\Pages\CreateRecord;

class CreateShopProduct extends CreateRecord
{
    protected static string $resource = ShopProductResource::class;

    protected function mutateFormDataBeforeCreate(array $data): array
    {
        $data['images'] = json_encode($data['images']);
        // dd($data);
        return $data;
    }
}
