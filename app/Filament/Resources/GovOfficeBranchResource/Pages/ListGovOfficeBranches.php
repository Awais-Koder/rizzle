<?php

namespace App\Filament\Resources\GovOfficeBranchResource\Pages;

use App\Filament\Resources\GovOfficeBranchResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListGovOfficeBranches extends ListRecords
{
    protected static string $resource = GovOfficeBranchResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
