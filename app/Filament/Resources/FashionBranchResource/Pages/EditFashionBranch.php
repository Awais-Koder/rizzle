<?php

namespace App\Filament\Resources\FashionBranchResource\Pages;

use App\Filament\Resources\FashionBranchResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditFashionBranch extends EditRecord
{
    protected static string $resource = FashionBranchResource::class;
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
