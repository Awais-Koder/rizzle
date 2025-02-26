<?php

namespace App\Filament\Resources\ElectronicBranchResource\Pages;

use App\Filament\Resources\ElectronicBranchResource;
use Filament\Actions;
use Filament\Resources\Pages\CreateRecord;

class CreateElectronicBranch extends CreateRecord
{
    protected static string $resource = ElectronicBranchResource::class;
    protected function mutateFormDataBeforeCreate(array $data): array
    {
        if(!empty($data['images'])){
            $data['images'] = json_encode($data['images']);
        }
        // dd($data);
        return $data;
    }
}
