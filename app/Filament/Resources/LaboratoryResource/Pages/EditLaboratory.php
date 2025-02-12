<?php

namespace App\Filament\Resources\LaboratoryResource\Pages;

use App\Filament\Resources\LaboratoryResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditLaboratory extends EditRecord
{
    protected static string $resource = LaboratoryResource::class;
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
