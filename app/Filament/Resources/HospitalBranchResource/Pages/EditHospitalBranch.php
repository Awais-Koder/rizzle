<?php

namespace App\Filament\Resources\HospitalBranchResource\Pages;

use App\Filament\Resources\HospitalBranchResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditHospitalBranch extends EditRecord
{
    protected static string $resource = HospitalBranchResource::class;
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
