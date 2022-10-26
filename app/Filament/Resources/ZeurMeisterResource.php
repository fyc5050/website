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
use Illuminate\Validation\Rules\Unique;

class ZeurMeisterResource extends Resource
{
    protected static ?string $model = ZeurMeister::class;

    protected static ?string $navigationIcon = 'heroicon-o-collection';

    public static function form(Form $form): Form
    {
        $date = now();

        return $form
            ->schema([
                Forms\Components\Select::make('user_id')
                    ->relationship('user', 'name')
                    ->label('User')
                    ->options(User::pluck('name', 'id')),

                // TODO: validation of only one weekly.

                Forms\Components\TextInput::make('week_number')
                    ->default($date->week),

                Forms\Components\TextInput::make('year_number')
                    ->default($date->year),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('user.name'),
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
