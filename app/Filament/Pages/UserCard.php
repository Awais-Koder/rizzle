<?php

namespace App\Filament\Pages;

use Filament\Pages\Page;
use Filament\Tables\Contracts\HasTable;
use Filament\Tables\Concerns\InteractsWithTable;
use Filament\Tables\Table;
use Filament\Tables\Columns\TextColumn;
use App\Models\User;
use Illuminate\Support\Str;
use Filament\Tables;
use Filament\Notifications\Notification;
use Filament\Forms\Components\TextInput;


class UserCard extends Page implements HasTable
{
    use InteractsWithTable;
    protected static ?string $navigationIcon = 'heroicon-o-credit-card';
    protected static ?string $navigationLabel = 'User Cards';

    protected static string $view = 'filament.pages.user-card';

    public function table(Table $table): Table
    {
        return $table
            ->query(User::where('card_status', 'applied'))
            ->columns([
                TextColumn::make('name'),
                TextColumn::make('card_number'),
                TextColumn::make('card_name')
                    ->default('Null'),
                TextColumn::make('card_status')
                    ->badge()
                    ->color('green')
                    ->formatStateUsing(fn($state) => Str::headline($state)),
            ])
            ->filters([
                // ...
            ])
            ->actions([
                Tables\Actions\Action::make('Approve')
                    ->icon('heroicon-o-check-circle')
                    ->requiresConfirmation() // Adds a confirmation dialog
                    ->modalHeading('Approve Card?') // Custom heading
                    ->modalDescription('Are you sure you want to approve this card? This action cannot be undone.') // Custom description
                    ->modalButton('Yes, Approve') // Customize confirmation button text
                    ->action(function (User $user) {
                        // Update the card_status
                        $user->update(['card_status' => 'approved']);

                        // Send a notification
                        Notification::make()
                            ->title('Card Approved')
                            ->body("The card for {$user->name} has been approved.")
                            ->success()
                            ->send();
                    })
                    ->color('green'),
                Tables\Actions\Action::make('Decline')
                    ->icon('heroicon-o-x-circle')
                    ->requiresConfirmation() // Adds a confirmation dialog
                    ->modalHeading('Decline Card?') // Custom heading
                    ->modalDescription('Are you sure you want to decline this card? This action cannot be undone.') // Custom description
                    ->modalButton('Yes, Decline') // Customize confirmation button text
                    ->action(function (User $user) {
                        // Update the card_status
                        $user->update(['card_status' => 'declined']);

                        // Send a notification
                        Notification::make()
                            ->title('Card Declined')
                            ->body("The card for {$user->name} has been declined.")
                            ->success()
                            ->send();
                    })
                    ->color('red'),
                Tables\Actions\Action::make('Edit')
                    ->icon('heroicon-o-pencil')
                    ->form([
                        TextInput::make('card_name')
                            ->label('User Name')
                            ->required(),
                    ])
                    ->action(function ($record, array $data) {
                        $record->update(['card_name' => $data['card_name']]);

                        \Filament\Notifications\Notification::make()
                            ->title('Name Updated')
                            ->body('The card name has been updated successfully.')
                            ->success()
                            ->send();
                    })
                    ->modalHeading('Edit User Name')
                    ->modalButton('Save'),

            ])
            ->bulkActions([
                // ...
            ]);
    }
}
