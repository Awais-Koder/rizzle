<?php

namespace App\Filament\Resources\FashionResource\Pages;

use App\Filament\Resources\FashionResource;
use Filament\Actions;
use Filament\Resources\Pages\CreateRecord;

class CreateFashion extends CreateRecord
{
    protected static string $resource = FashionResource::class;
    protected function mutateFormDataBeforeCreate(array $data): array
    {
        $data['images'] = json_encode($data['images']);
        // dd($data);
        return $data;
    }
}
