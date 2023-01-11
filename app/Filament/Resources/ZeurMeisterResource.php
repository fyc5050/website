<?php

namespace App\Filament\Resources;

use App\Filament\Resources\ZeurMeisterResource\Pages;
use App\Models\ZeurMeister;
use Filament\Forms;
use Filament\Resources\Form;
use Filament\Resources\Resource;
use Filament\Resources\Table;
use Filament\Tables;

class ZeurMeisterResource extends Resource
{
    protected static ?string $model = ZeurMeister::class;

    protected static ?string $navigationIcon = 'heroicon-o-collection';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('name')
                    ->required()
                    ->maxLength(100),

                Forms\Components\DatePicker::make('starts_at')
                    ->default(now()->startofWeek()),

                Forms\Components\DatePicker::make('ends_at')
                    ->default(now()->endOfWeek())
                    ->required(),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('name'),
                Tables\Columns\TextColumn::make('starts_at')
                    ->date(),
                Tables\Columns\TextColumn::make('ends_at')
                    ->date(),
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
                Tables\Actions\DeleteAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\DeleteBulkAction::make(),
            ]);
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ManageZeurMeisters::route('/'),
        ];
    }
}
