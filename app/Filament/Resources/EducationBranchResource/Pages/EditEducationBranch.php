<?php

namespace App\Filament\Resources\EducationBranchResource\Pages;

use App\Filament\Resources\EducationBranchResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditEducationBranch extends EditRecord
{
    protected static string $resource = EducationBranchResource::class;
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
