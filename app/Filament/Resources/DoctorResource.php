<?php

namespace App\Filament\Resources;

use App\Filament\Resources\DoctorResource\Pages;
use App\Filament\Resources\DoctorResource\RelationManagers;
use App\Models\Doctor;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class DoctorResource extends Resource
{
    protected static ?string $model = Doctor::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';
    protected static ?string $navigationGroup = 'Doctor Management';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Select::make('city_id')
                    ->relationship('city', 'name')
                    ->preload()
                    ->optionsLimit(5)
                    ->native(false)
                    ->searchable()
                    ->required(),
                Forms\Components\Select::make('doctor_category_id')
                    ->relationship('doctorCategory', 'name')
                    ->preload()
                    ->optionsLimit(5)
                    ->native(false)
                    ->searchable()
                    ->required(),
                Forms\Components\TextInput::make('fees')
                    ->required()
                    ->numeric(),
                Forms\Components\TextInput::make('name')
                    ->required()
                    ->maxLength(255),
                Forms\Components\TextInput::make('reviews')
                    ->required(),
                Forms\Components\TextInput::make('short_description')
                    ->required()
                    ->maxLength(255),
                Forms\Components\Textarea::make('about_me')
                    ->required()
                    ->columnSpanFull(),
                Forms\Components\Textarea::make('experience')
                    ->required()
                    ->columnSpanFull(),
                Forms\Components\Textarea::make('schedule')
                    ->hintIcon('heroicon-o-information-circle')
                    ->hintIconTooltip('The schedule should be in comma separated format. For example: "Monday, Tuesday, Wednesday"')
                    ->required()
                    ->dehydrateStateUsing(fn($state) => is_array($state) ? json_encode($state) : json_encode(array_map('trim', explode(',', $state))))
                    ->beforeStateDehydrated(function ($record) {
                        if (!empty($record->schedule))
                            return json_decode($record->schedule, true);
                    })
                    ->formatStateUsing(function ($record) {
                        if (!empty($record->schedule))
                            return json_decode($record->schedule, true);
                    })
                    ->columnSpanFull(),
                Forms\Components\TextInput::make('address')
                    ->required()
                    ->maxLength(255),
                Forms\Components\TextInput::make('whatsapp')
                    ->required()
                    ->maxLength(255),
                Forms\Components\TextInput::make('phone')
                    ->required()
                    ->maxLength(255),
                Forms\Components\FileUpload::make('image')
                ->label('Icon')
                    ->imageEditor()
                    ->image()
                    ->required(),
                Forms\Components\TextInput::make('latitude')
                    ->required()
                    ->numeric(),
                Forms\Components\TextInput::make('longitude')
                    ->required()
                    ->numeric(),
                Forms\Components\TextInput::make('video_youtube_link')
                    ->required()
                    ->maxLength(255),
                Forms\Components\Toggle::make('ad_tag'),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('city.name')
                    ->numeric()
                    ->sortable(),
                Tables\Columns\TextColumn::make('doctorCategory.name')
                    ->numeric()
                    ->sortable(),
                Tables\Columns\TextColumn::make('fees')
                    ->numeric()
                    ->sortable(),
                Tables\Columns\TextColumn::make('schedule')
                    ->formatStateUsing(function ($record) {
                        if (!empty($record->schedule)) {
                            return implode(', ', json_decode($record->schedule, true)); // Convert array to comma-separated string
                        }
                        return '-'; // Default placeholder if no data
                    }),
                Tables\Columns\TextColumn::make('name')
                    ->searchable(),
                Tables\Columns\TextColumn::make('short_description')
                    ->limit(10)
                    ->searchable(),
                Tables\Columns\TextColumn::make('address')
                    ->limit(10)
                    ->searchable(),
                Tables\Columns\TextColumn::make('whatsapp')
                    ->limit(15)
                    ->searchable(),
                Tables\Columns\TextColumn::make('phone')
                    ->searchable(),
                Tables\Columns\ImageColumn::make('image'),
                Tables\Columns\TextColumn::make('latitude')
                    ->numeric()
                    ->sortable(),
                Tables\Columns\TextColumn::make('longitude')
                    ->numeric()
                    ->sortable(),
                Tables\Columns\IconColumn::make('video_youtube_link')
                    ->label('YouTube Video')
                    ->icon('heroicon-o-play')
                    ->color('green')
                    ->url(fn($record) => $record->video_youtube_link) // Make it clickable
                    ->openUrlInNewTab(), // Open in a new tab
                Tables\Columns\IconColumn::make('ad_tag')
                    ->boolean(),
                Tables\Columns\TextColumn::make('created_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
                Tables\Columns\TextColumn::make('updated_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                ]),
            ]);
    }

    public static function getRelations(): array
    {
        return [
            //
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListDoctors::route('/'),
            'create' => Pages\CreateDoctor::route('/create'),
            'edit' => Pages\EditDoctor::route('/{record}/edit'),
        ];
    }
}
