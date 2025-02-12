<?php

namespace App\Filament\Resources\FitnessBranchResource\Pages;

use App\Filament\Resources\FitnessBranchResource;
use Filament\Actions;
use Filament\Resources\Pages\CreateRecord;

class CreateFitnessBranch extends CreateRecord
{
    protected static string $resource = FitnessBranchResource::class;
    protected function mutateFormDataBeforeCreate(array $data): array
    {
        $data['images'] = json_encode($data['images']);
        // dd($data);
        return $data;
    }
}
