<?php

namespace App\Filament\Resources\PharmacyBranchResource\Pages;

use App\Filament\Resources\PharmacyBranchResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListPharmacyBranches extends ListRecords
{
    protected static string $resource = PharmacyBranchResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
