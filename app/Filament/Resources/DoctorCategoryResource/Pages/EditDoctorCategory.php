<?php

namespace App\Filament\Resources\DoctorCategoryResource\Pages;

use App\Filament\Resources\DoctorCategoryResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditDoctorCategory extends EditRecord
{
    protected static string $resource = DoctorCategoryResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
