<?php

namespace App\Filament\Resources\FitnessResource\Pages;

use App\Filament\Resources\FitnessResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditFitness extends EditRecord
{
    protected static string $resource = FitnessResource::class;
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
