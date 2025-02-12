<?php

namespace App\Filament\Resources\ElectronicResource\Pages;

use App\Filament\Resources\ElectronicResource;
use Filament\Actions;
use Filament\Resources\Pages\CreateRecord;

class CreateElectronic extends CreateRecord
{
    protected static string $resource = ElectronicResource::class;
    protected function mutateFormDataBeforeCreate(array $data): array
    {
        $data['images'] = json_encode($data['images']);
        // dd($data);
        return $data;
    }
}
