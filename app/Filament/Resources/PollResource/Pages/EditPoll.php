<?php

namespace App\Filament\Resources\PollResource\Pages;

use App\Filament\Resources\PollResource;
use Filament\Pages\Actions;
use Filament\Resources\Pages\EditRecord;

/**
 * @property-read \App\Models\Poll $record
 */
class EditPoll extends EditRecord
{
    protected static string $resource = PollResource::class;

    protected function getActions(): array
    {
        return [
            Actions\Action::make('toggle_publication')
                ->label(function() {
                    return $this->record->is_published ? 'Unpublish Results' : 'Publish Results';
                })
                ->action(function() {
                    if ($this->record->is_published) {
                        $this->record->unpublish();
                    } else {
                        $this->record->publish();
                    }
                }),

            Actions\Action::make('toggle_lock')
                ->label(function () {
                    return $this->record->isLocked() ? 'Unlock' : 'Lock';
                })
                ->action(function () {
                    if ($this->record->isLocked()) {
                        $this->record->locks_at = null;
                    } else {
                        $this->record->locks_at = now();
                    }

                    $this->record->save();
                }),

            Actions\DeleteAction::make(),
        ];
    }

    protected function getHeaderWidgets(): array
    {
        return [
            PollResource\Widgets\SubmissionsPieChart::class,
        ];
    }
}
