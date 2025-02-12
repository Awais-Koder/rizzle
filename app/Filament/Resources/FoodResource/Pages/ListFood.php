<?php

namespace App\Filament\Resources\FoodResource\Pages;

use App\Filament\Resources\FoodResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListFood extends ListRecords
{
    protected static string $resource = FoodResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
            Actions\Action::make('Branches')
            ->url(route('filament.admin.resources.food-branches.index')),
        ];
    }
}
