<?php

use Filament\Forms;

if (!function_exists('time_field')) {
    function time_field()
    {
        return Forms\Components\Textarea::make('time')
            ->hintIcon('heroicon-o-information-circle')
            ->hintIconTooltip('The time should be in comma-separated format. For example: "Monday, Tuesday, Wednesday"')
            ->required()
            ->dehydrateStateUsing(fn($state) => is_array($state) ? json_encode($state) : json_encode(array_map('trim', explode(',', $state))))
            ->beforeStateDehydrated(fn($record) => !empty($record->time) ? json_decode($record->time, true) : null)
            ->formatStateUsing(fn($record) => !empty($record->time) ? json_decode($record->time, true) : null)
            ->columnSpanFull();
    }
}
