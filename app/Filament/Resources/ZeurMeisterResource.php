<?php

namespace App\Filament\Resources;

use App\Filament\Resources\ZeurMeisterResource\Pages;
use App\Models\User;
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
        $date = now();

        return $form
            ->schema([
                Forms\Components\TextInput::make('name')
                    ->required()
                    ->maxLength(100),

                Forms\Components\DatePicker::make('starts_at')
                    ->default($date),

                Forms\Components\DatePicker::make('ends_at')
                    ->default($date->addWeek())
                    ->required(),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('name'),
                Tables\Columns\TextColumn::make('week_number'),
                Tables\Columns\TextColumn::make('year_number'),
            ])
            ->filters([
                //
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
