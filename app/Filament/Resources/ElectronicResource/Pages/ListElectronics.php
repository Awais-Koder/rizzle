<?php

namespace App\Filament\Resources\ElectronicResource\Pages;

use App\Filament\Resources\ElectronicResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListElectronics extends ListRecords
{
    protected static string $resource = ElectronicResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
            Actions\Action::make('Branches')
            ->url(route('filament.admin.resources.electronic-branches.index')),
        ];
    }
}
