<?php

namespace App\Services;
use Filament\Forms;
class FieldService
{
    public static function time()
    {
        return
            Forms\Components\Textarea::make('time')
                ->hintIcon('heroicon-o-information-circle')
                ->hintIconTooltip('The time should be in comma separated format. For example: "Monday, Tuesday, Wednesday"')
                ->required()
                ->dehydrateStateUsing(fn($state) => is_array($state) ? json_encode($state) : json_encode(array_map('trim', explode(',', $state))))
                ->beforeStateDehydrated(function ($record) {
                    if (!empty($record->time))
                        return json_decode($record->time, true);
                })
                ->formatStateUsing(function ($record) {
                    if (!empty($record->time))
                        return json_decode($record->time, true);
                })
                ->columnSpanFull();
    }
}
##
