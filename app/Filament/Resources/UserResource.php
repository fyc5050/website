<?php

namespace App\Filament\Resources;

use App\Actions\CreateDesMutation;
use App\Enums\DesMutationState;
use App\Filament\Resources\UserResource\Pages;
use App\Models\DesMutation;
use App\Models\User;
use Filament\Forms;
use Filament\Resources\Form;
use Filament\Resources\Resource;
use Filament\Resources\Table;
use Filament\Tables;
use Illuminate\Support\Facades\Auth;

class UserResource extends Resource
{
    protected static ?string $model = User::class;
    protected static ?string $navigationIcon = 'heroicon-o-user-group';
    protected static ?string $recordTitleAttribute = 'name';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('name')
                    ->maxLength('200')
                    ->required(),

                Forms\Components\TextInput::make('email')
                    ->email()
                    ->required(),

                Forms\Components\TextInput::make('password')
                    ->password()
                    ->required(),

                Forms\Components\Checkbox::make('is_admin'),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('name'),
                Tables\Columns\TextColumn::make('email'),

                Tables\Columns\BadgeColumn::make('des_count'),

                Tables\Columns\IconColumn::make('is_admin')
                    ->boolean()
                    ->label('Admin'),

                Tables\Columns\IconColumn::make('is_des_manager')
                    ->boolean()
                    ->label('Des Manager'),

                Tables\Columns\TextColumn::make('created_at')
                    ->date(),
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
                Tables\Actions\DeleteAction::make(),

                Tables\Actions\Action::make('mutate_des')
                    ->icon('heroicon-o-beaker')
                    ->form([
                        Forms\Components\TextInput::make('mutation')
                            ->numeric()
                            ->required(),
                    ])
                    ->action(static fn (User $record, array $data)
                                => new CreateDesMutation($record, Auth::user(), $data['mutation'])),
            ])
            ->bulkActions([
                Tables\Actions\DeleteBulkAction::make(),
            ]);
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ManageUsers::route('/'),
        ];
    }
}
