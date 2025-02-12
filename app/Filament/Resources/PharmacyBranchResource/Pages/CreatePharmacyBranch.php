<?php

namespace App\Filament\Resources\PharmacyBranchResource\Pages;

use App\Filament\Resources\PharmacyBranchResource;
use Filament\Actions;
use Filament\Resources\Pages\CreateRecord;

class CreatePharmacyBranch extends CreateRecord
{
    protected static string $resource = PharmacyBranchResource::class;
    protected function mutateFormDataBeforeCreate(array $data): array
    {
        $data['images'] = json_encode($data['images']);
        // dd($data);
        return $data;
    }
}
