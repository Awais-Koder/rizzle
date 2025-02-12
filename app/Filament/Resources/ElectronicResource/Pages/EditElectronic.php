<?php

namespace App\Filament\Resources\ElectronicResource\Pages;

use App\Filament\Resources\ElectronicResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditElectronic extends EditRecord
{
    protected static string $resource = ElectronicResource::class;
    protected function mutateFormDataBeforeSave(array $data): array
    {
        $data['images'] = json_encode($data['images']);
        // dd($data);
        return $data;
    }
    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
