<?php

namespace App\Filament\Resources\HospitalBranchResource\Pages;

use App\Filament\Resources\HospitalBranchResource;
use Filament\Actions;
use Filament\Resources\Pages\CreateRecord;

class CreateHospitalBranch extends CreateRecord
{
    protected static string $resource = HospitalBranchResource::class;
    protected function mutateFormDataBeforeCreate(array $data): array
    {
        $data['images'] = json_encode($data['images']);
        // dd($data);
        return $data;
    }
}
