<?php

namespace App\Filament\Resources\FitnessResource\Pages;

use App\Filament\Resources\FitnessResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListFitnesses extends ListRecords
{
    protected static string $resource = FitnessResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
            Actions\Action::make('Branches')
            ->url(route('filament.admin.resources.fitness-branches.index')),
        ];
    }
}
