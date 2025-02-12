<?php

namespace App\Filament\Resources\PharmacyBranchResource\Pages;

use App\Filament\Resources\PharmacyBranchResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditPharmacyBranch extends EditRecord
{
    protected static string $resource = PharmacyBranchResource::class;
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
