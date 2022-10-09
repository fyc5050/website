<?php

namespace App\Filament\Resources;

use App\Filament\Resources\PollResource\Pages;
use App\Filament\Resources\PollResource\RelationManagers;
use App\Filament\Resources\PollResource\Widgets\SubmissionsPieChart;
use App\Models\Poll;
use Filament\Forms;
use Filament\Resources\Form;
use Filament\Resources\Resource;
use Filament\Resources\Table;
use Filament\Tables;
use Illuminate\Contracts\Database\Eloquent\Builder;

class PollResource extends Resource
{
    protected static ?string $model = Poll::class;
    protected static ?string $navigationIcon = 'heroicon-o-collection';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('name')
                    ->required()
                    ->maxLength(100),

                Forms\Components\DateTimePicker::make('locks_at')
                    ->nullable()
                    ->after(now()),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('name'),

                Tables\Columns\BooleanColumn::make('is_locked')
                    ->label('Locked')
                    ->getStateUsing(static fn (Poll $record) => $record->isLocked()),

                Tables\Columns\BooleanColumn::make('is_published')
                    ->label('Published'),
            ])
            ->filters([
                Tables\Filters\Filter::make('is_locked')
                    ->query(fn (Builder $query) => $query->whereDate('locks_at', '<=', now()))
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
                Tables\Actions\DeleteAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\DeleteBulkAction::make(),
            ]);
    }

    public static function getRelations(): array
    {
        return [
            RelationManagers\AnswersRelationManager::class,
        ];
    }

    public static function getWidgets(): array
    {
        return [
            SubmissionsPieChart::class,
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListPolls::route('/'),
            'create' => Pages\CreatePoll::route('/create'),
            'edit' => Pages\EditPoll::route('/{record}/edit'),
        ];
    }
}
