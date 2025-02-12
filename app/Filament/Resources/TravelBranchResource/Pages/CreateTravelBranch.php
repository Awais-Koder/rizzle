<?php

namespace App\Filament\Resources\TravelBranchResource\Pages;

use App\Filament\Resources\TravelBranchResource;
use Filament\Actions;
use Filament\Resources\Pages\CreateRecord;

class CreateTravelBranch extends CreateRecord
{
    protected static string $resource = TravelBranchResource::class;
    protected function mutateFormDataBeforeCreate(array $data): array
    {
        $data['images'] = json_encode($data['images']);
        // dd($data);
        return $data;
    }
}
