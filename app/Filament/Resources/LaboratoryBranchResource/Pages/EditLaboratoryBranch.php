<?php

namespace App\Filament\Resources\LaboratoryBranchResource\Pages;

use App\Filament\Resources\LaboratoryBranchResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditLaboratoryBranch extends EditRecord
{
    protected static string $resource = LaboratoryBranchResource::class;
    protected function mutateFormDataBeforeSave(array $data): array
    {
        $data['images'] = json_encode($data['images']);
        // dd($data);
        return $data;
    }

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
