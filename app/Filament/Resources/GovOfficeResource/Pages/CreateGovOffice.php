<?php

namespace App\Filament\Resources\GovOfficeResource\Pages;

use App\Filament\Resources\GovOfficeResource;
use Filament\Actions;
use Filament\Resources\Pages\CreateRecord;

class CreateGovOffice extends CreateRecord
{
    protected static string $resource = GovOfficeResource::class;
    protected function mutateFormDataBeforeCreate(array $data): array
    {
        $data['images'] = json_encode($data['images']);
        // dd($data);
        return $data;
    }
}
