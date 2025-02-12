<?php

namespace App\Filament\Resources\TravelBranchResource\Pages;

use App\Filament\Resources\TravelBranchResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListTravelBranches extends ListRecords
{
    protected static string $resource = TravelBranchResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
