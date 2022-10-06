<?php

namespace App\Filament\Resources\PollResource\Widgets;

use Filament\Widgets\DoughnutChartWidget;

class PollSubmissionsChart extends DoughnutChartWidget
{
    protected static ?string $heading = 'Submissions';

    protected static ?string $maxHeight = '300px;';

    protected function getData(): array
    {
        return [
            'datasets' => [
                [
                    'label' => 'Blog posts created',
                    'data' => [0, 10, 5, 2, 21, 32, 45, 74, 65, 45, 77, 89],
                ],
            ],
            'labels' => ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec'],
        ];
    }
}
