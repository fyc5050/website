<?php

namespace App\Filament\Resources;

use App\Actions\ApproveDesMutation;
use App\Actions\DeclineDesMutation;
use App\Enums\DesMutationState;
use App\Filament\Resources\DesMutationResource\Pages;
use App\Models\DesMutation;
use Filament\Resources\Resource;
use Filament\Resources\Table;
use Filament\Tables;
use Illuminate\Support\Facades\Auth;

class DesMutationResource extends Resource
{
    protected static ?string $model = DesMutation::class;

    protected static ?string $navigationIcon = 'heroicon-o-beaker';

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('user.name'),

                Tables\Columns\BadgeColumn::make('mutation')
                    ->color(fn (DesMutation $record) => $record->mutation < 0 ? 'danger' : 'success'),

                Tables\Columns\BadgeColumn::make('state')
                    ->enum([
                        DesMutationState::APPROVED->value => 'Approved',
                        DesMutationState::DECLINED->value => 'Declined',
                        DesMutationState::PENDING->value => 'Pending',
                    ])
                    ->colors([
                        'danger' => DesMutationState::DECLINED->value,
                        'warning' => DesMutationState::PENDING->value,
                        'success' => DesMutationState::APPROVED->value,
                    ]),

                Tables\Columns\BadgeColumn::make('count_after')
                    ->default('-'),

                Tables\Columns\TextColumn::make('createdBy.name')
                    ->default('-'),

                Tables\Columns\TextColumn::make('statusUpdatedBy.name')
                    ->default('-'),

                Tables\Columns\TextColumn::make('created_at')
                    ->dateTime()
                    ->sortable(),
            ])
            ->defaultSort('created_at', 'desc')
            ->filters([
                Tables\Filters\SelectFilter::make('state')
                    ->options([
                        DesMutationState::APPROVED->value => 'Approved',
                        DesMutationState::DECLINED->value => 'Declined',
                        DesMutationState::PENDING->value => 'Pending',
                    ])
                    ->multiple(),
            ])
            ->actions([
                // Approve action
                Tables\Actions\Action::make('approve')
                    ->visible(fn (DesMutation $record)
                                => Auth::user()->is_des_manager && $record->state === DesMutationState::PENDING)
                    ->color('success')
                    ->action(static fn (DesMutation $record)
                                => (new ApproveDesMutation($record, Auth::user()))->execute()),

                // Decline action
                Tables\Actions\Action::make('decline')
                    ->visible(fn (DesMutation $record)
                                => Auth::user()->is_des_manager && $record->state === DesMutationState::PENDING)
                    ->color('danger')
                    ->action(static fn (DesMutation $record)
                                => (new DeclineDesMutation($record, Auth::user()))->execute()),
            ])
            ->bulkActions([
                Tables\Actions\DeleteBulkAction::make(),
            ]);
    }


    public static function getPages(): array
    {
        return [
            'index' => Pages\ManageDesMutations::route('/'),
        ];
    }
    public static function canCreate(): bool
    {
        return false;
    }
}
