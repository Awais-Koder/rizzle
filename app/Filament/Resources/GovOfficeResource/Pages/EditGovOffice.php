<?php

namespace App\Filament\Resources\GovOfficeResource\Pages;

use App\Filament\Resources\GovOfficeResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditGovOffice extends EditRecord
{
    protected static string $resource = GovOfficeResource::class;
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
