<?php

namespace App\Filament\Resources\EducationBranchResource\Pages;

use App\Filament\Resources\EducationBranchResource;
use Filament\Actions;
use Filament\Resources\Pages\CreateRecord;

class CreateEducationBranch extends CreateRecord
{
    protected function mutateFormDataBeforeCreate(array $data): array
    {
        $data['images'] = json_encode($data['images']);
        // dd($data);
        return $data;
    }
    protected static string $resource = EducationBranchResource::class;
}
