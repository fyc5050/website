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
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class QuoteResource extends Resource
{
    protected static ?string $model = Quote::class;
    protected static ?string $navigationIcon = 'heroicon-o-at-symbol';

    public static function getRecordTitle(?Model $record): ?string
    {
        return sprintf(
            '"%s" - %s',
            Str::limit($record->content, 20), Str::limit($record->said_by, 10)
        );
    }

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
                Tables\Columns\TextColumn::make('content'),
                Tables\Columns\TextColumn::make('said_by'),

                Tables\Columns\IconColumn::make('is_hidden')
                    ->boolean()
                    ->label('Hidden'),

                Tables\Columns\TextColumn::make('created_at')
                    ->dateTime(),
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
                Tables\Actions\DeleteAction::make(),

                Tables\Actions\Action::make('toggle_hidden')
                    ->label(static function (Quote $record) {
                        return $record->is_hidden ? 'Display' : 'Hide';
                    })
                    ->action(fn (Quote $record) => $record->update(['is_hidden' => !$record->is_hidden])),
            ])
            ->filters([
                Tables\Filters\Filter::make('is_hidden')
                    ->query(fn (Builder $query) => $query->scopes('hidden')),
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
