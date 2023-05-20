<?php

namespace App\Filament\Resources\DesMutationResource\Pages;

use App\Filament\Resources\DesMutationResource;
use Filament\Pages\Actions;
use Filament\Resources\Pages\ManageRecords;

class ManageDesMutations extends ManageRecords
{
    protected static string $resource = DesMutationResource::class;

    protected function getActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
