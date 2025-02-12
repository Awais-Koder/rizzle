<?php

namespace App\Filament\Resources\GovOfficeBranchResource\Pages;

use App\Filament\Resources\GovOfficeBranchResource;
use Filament\Actions;
use Filament\Resources\Pages\CreateRecord;

class CreateGovOfficeBranch extends CreateRecord
{
    protected static string $resource = GovOfficeBranchResource::class;
    protected function mutateFormDataBeforeCreate(array $data): array
    {
        $data['images'] = json_encode($data['images']);
        // dd($data);
        return $data;
    }
}
