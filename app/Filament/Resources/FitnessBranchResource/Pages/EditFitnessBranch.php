<?php

namespace App\Filament\Resources\FitnessBranchResource\Pages;

use App\Filament\Resources\FitnessBranchResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditFitnessBranch extends EditRecord
{
    protected static string $resource = FitnessBranchResource::class;
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
