<?php

namespace App\Filament\Resources\LaboratoryBranchResource\Pages;

use App\Filament\Resources\LaboratoryBranchResource;
use Filament\Actions;
use Filament\Resources\Pages\CreateRecord;

class CreateLaboratoryBranch extends CreateRecord
{
    protected static string $resource = LaboratoryBranchResource::class;
    protected function mutateFormDataBeforeCreate(array $data): array
    {
        $data['images'] = json_encode($data['images']);
        // dd($data);
        return $data;
    }
}
