<?php

namespace App\Filament\Resources\ShopBranchResource\Pages;

use App\Filament\Resources\ShopBranchResource;
use Filament\Actions;
use Filament\Resources\Pages\CreateRecord;

class CreateShopBranch extends CreateRecord
{
    protected static string $resource = ShopBranchResource::class;
    protected function mutateFormDataBeforeCreate(array $data): array
    {
        $data['images'] = json_encode($data['images']);
        // dd($data);
        return $data;
    }
}
