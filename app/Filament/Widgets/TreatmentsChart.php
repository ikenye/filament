<?php

namespace App\Filament\Widgets;

use App\Models\Treatment;
use Filament\Widgets\LineChartWidget;
use Flowframe\Trend\Trend;
use Flowframe\Trend\TrendValue;

class TreatmentsChart extends LineChartWidget
{
    protected static ?string $heading = 'Treatments Chart';

    protected function getData(): array
    {
        $data = Trend::model(Treatment::class)
            ->between(
                start: now()->subYear(),
                end: now(),
            )
            ->perMonth()
            ->count();

        // dd($data);

        return [
            'datasets' => [
                [
                    'label' => 'Treatments',
                    'data' => $data->map(fn (TrendValue $value) => $value->aggregate),
                ],
            ],
            'labels' => $data->map(fn (TrendValue $value) => $value->date),
        ];
    }
}
