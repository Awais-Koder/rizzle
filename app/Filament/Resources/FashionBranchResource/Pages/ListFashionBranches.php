<?php

namespace App\Filament\Resources\FashionBranchResource\Pages;

use App\Filament\Resources\FashionBranchResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListFashionBranches extends ListRecords
{
    protected static string $resource = FashionBranchResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
