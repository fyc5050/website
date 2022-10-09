<?php

namespace App\Filament\Resources\PollResource\Widgets;

use App\Models\Poll;
use App\Models\PollAnswer;
use Filament\Widgets\DoughnutChartWidget;

class SubmissionsPieChart extends DoughnutChartWidget
{
    protected static ?string $heading = 'Submission Distribution';
    protected static ?string $maxHeight = '250px';
    protected static ?string $pollingInterval = null;

    protected static ?array $options = [
        'plugins' => [
            'legend' => [
                'display' => true,
            ],
        ],
    ];

    public ?Poll $record = null;

    /**
     * @throws \Throwable
     */
    protected function getData(): array
    {
        throw_if(is_null($this->record), 'Record cannot be null.');

        $answerCounts = $this->record->answers()
            ->withCount('submissions')
            ->get(['name']);

        return [
            'datasets' => [
                [
                    'label' => 'Submissions',
                    'data' => $answerCounts->map(fn (PollAnswer $answer) => $answer->submissions_count),
                    'backgroundColor' => $answerCounts->map(fn () => sprintf('#%06X', mt_rand(0, 0xFFFFFF))),
                ],
            ],

            'labels' => $answerCounts->map(fn (PollAnswer $answer) => $answer->name),
        ];
    }
}
