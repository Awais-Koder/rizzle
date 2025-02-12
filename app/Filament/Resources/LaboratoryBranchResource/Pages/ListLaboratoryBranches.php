<?php

namespace App\Filament\Resources\LaboratoryBranchResource\Pages;

use App\Filament\Resources\LaboratoryBranchResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListLaboratoryBranches extends ListRecords
{
    protected static string $resource = LaboratoryBranchResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
