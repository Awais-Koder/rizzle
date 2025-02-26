<?php

namespace App\Filament\Resources\FoodResource\Pages;

use App\Filament\Resources\FoodResource;
use Filament\Actions;
use Filament\Resources\Pages\CreateRecord;

class CreateFood extends CreateRecord
{
    protected static string $resource = FoodResource::class;
    protected function mutateFormDataBeforeCreate(array $data): array
    {
        if(!empty($data['images'])){
            $data['images'] = json_encode($data['images']);
        }
        // dd($data);
        return $data;
    }
}
