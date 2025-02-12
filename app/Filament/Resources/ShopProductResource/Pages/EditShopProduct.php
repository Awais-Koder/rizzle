<?php

namespace App\Filament\Resources\ShopProductResource\Pages;

use App\Filament\Resources\ShopProductResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditShopProduct extends EditRecord
{
    protected static string $resource = ShopProductResource::class;
    protected function mutateFormDataBeforeEdit(array $data): array
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
