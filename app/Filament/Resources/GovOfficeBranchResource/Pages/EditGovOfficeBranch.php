<?php

namespace App\Filament\Resources\GovOfficeBranchResource\Pages;

use App\Filament\Resources\GovOfficeBranchResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditGovOfficeBranch extends EditRecord
{
    protected static string $resource = GovOfficeBranchResource::class;
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
