<?php

namespace App\Filament\Resources\HospitalBranchResource\Pages;

use App\Filament\Resources\HospitalBranchResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListHospitalBranches extends ListRecords
{
    protected static string $resource = HospitalBranchResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
