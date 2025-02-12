<?php

namespace App\Filament\Resources\EducationBranchResource\Pages;

use App\Filament\Resources\EducationBranchResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListEducationBranches extends ListRecords
{
    protected static string $resource = EducationBranchResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
