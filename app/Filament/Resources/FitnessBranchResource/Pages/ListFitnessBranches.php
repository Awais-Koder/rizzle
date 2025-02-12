<?php

namespace App\Filament\Resources\FitnessBranchResource\Pages;

use App\Filament\Resources\FitnessBranchResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListFitnessBranches extends ListRecords
{
    protected static string $resource = FitnessBranchResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
