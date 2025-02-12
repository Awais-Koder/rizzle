<?php

namespace App\Filament\Resources\ShopBranchResource\Pages;

use App\Filament\Resources\ShopBranchResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListShopBranches extends ListRecords
{
    protected static string $resource = ShopBranchResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
