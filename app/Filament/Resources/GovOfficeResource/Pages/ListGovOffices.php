<?php

namespace App\Filament\Resources\GovOfficeResource\Pages;

use App\Filament\Resources\GovOfficeResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListGovOffices extends ListRecords
{
    protected static string $resource = GovOfficeResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
            Actions\Action::make('Branches')
            ->url(route('filament.admin.resources.gov-office-branches.index')),
        ];
    }
}
