<?php

namespace App\Filament\Resources\ZeurMeisterResource\Pages;

use App\Filament\Resources\ZeurMeisterResource;
use Filament\Pages\Actions;
use Filament\Resources\Pages\ManageRecords;

class ManageZeurMeisters extends ManageRecords
{
    protected static string $resource = ZeurMeisterResource::class;

    protected function getActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
