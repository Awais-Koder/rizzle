<?php

namespace App\Filament\Resources\FitnessResource\Pages;

use App\Filament\Resources\FitnessResource;
use Filament\Actions;
use Filament\Resources\Pages\CreateRecord;

class CreateFitness extends CreateRecord
{
    protected static string $resource = FitnessResource::class;
    protected function mutateFormDataBeforeCreate(array $data): array
    {
        $data['images'] = json_encode($data['images']);
        // dd($data);
        return $data;
    }
}
