<?php

namespace App\Filament\Resources\ElectronicBranchResource\Pages;

use App\Filament\Resources\ElectronicBranchResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditElectronicBranch extends EditRecord
{
    protected static string $resource = ElectronicBranchResource::class;
    protected function mutateFormDataBeforeSave(array $data): array
    {
        if(!empty($data['images'])){
            $data['images'] = json_encode($data['images']);
        }
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
