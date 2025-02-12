<?php

namespace App\Filament\Resources\ShopBranchResource\Pages;

use App\Filament\Resources\ShopBranchResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditShopBranch extends EditRecord
{
    protected static string $resource = ShopBranchResource::class;
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
