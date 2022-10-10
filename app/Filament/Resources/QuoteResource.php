<?php

namespace App\Filament\Resources;

use App\Filament\Resources\QuoteResource\Pages;
use App\Models\Quote;
use Filament\Forms;
use Filament\Resources\Form;
use Filament\Resources\Resource;
use Filament\Resources\Table;
use Filament\Tables;
use Illuminate\Contracts\Database\Eloquent\Builder;

class QuoteResource extends Resource
{
    protected static ?string $model = Quote::class;
    protected static ?string $navigationIcon = 'heroicon-o-at-symbol';
    protected static ?string $recordTitleAttribute = 'uuid';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('content')
                    ->required()
                    ->maxLength(150),

                Forms\Components\TextInput::make('said_by')
                    ->required()
                    ->maxLength(100),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('uuid'),
                Tables\Columns\TextColumn::make('content'),
                Tables\Columns\TextColumn::make('said_by'),
                Tables\Columns\BooleanColumn::make('is_hidden')
                    ->label('Hidden'),
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
                Tables\Actions\DeleteAction::make(),

                Tables\Actions\Action::make('hide')
                    ->hidden(fn (Quote $record) => $record->is_hidden)
                    ->action(fn (Quote $record) => $record->update(['is_hidden' => true])),

                Tables\Actions\Action::make('display')
                    ->hidden(fn (Quote $record) => !$record->is_hidden)
                    ->action(fn (Quote $record) => $record->update(['is_hidden' => false])),
            ])
            ->filters([
                Tables\Filters\Filter::make('is_hidden')
                    ->query(fn (Builder $query) => $query->where('is_hidden', true)),
            ])
            ->bulkActions([
                Tables\Actions\DeleteBulkAction::make(),
            ]);
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ManageQuotes::route('/'),
        ];
    }
}
