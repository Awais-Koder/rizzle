<?php

namespace App\Filament\Resources\FashionBranchResource\Pages;

use App\Filament\Resources\FashionBranchResource;
use Filament\Actions;
use Filament\Resources\Pages\CreateRecord;

class CreateFashionBranch extends CreateRecord
{
    protected static string $resource = FashionBranchResource::class;
    protected function mutateFormDataBeforeCreate(array $data): array
    {
        $data['images'] = json_encode($data['images']);
        // dd($data);
        return $data;
    }
}
