<?php

namespace App\Filament\Resources\ElectronicBranchResource\Pages;

use App\Filament\Resources\ElectronicBranchResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListElectronicBranches extends ListRecords
{
    protected static string $resource = ElectronicBranchResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
