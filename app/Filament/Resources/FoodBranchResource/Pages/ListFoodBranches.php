<?php

namespace App\Filament\Resources\FoodBranchResource\Pages;

use App\Filament\Resources\FoodBranchResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListFoodBranches extends ListRecords
{
    protected static string $resource = FoodBranchResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
