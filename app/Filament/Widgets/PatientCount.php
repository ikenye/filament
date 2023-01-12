<?php

namespace App\Filament\Widgets;

use App\Models\Patient;
use Filament\Widgets\StatsOverviewWidget as BaseWidget;
use Filament\Widgets\StatsOverviewWidget\Card;

class PatientCount extends BaseWidget
{
    protected function getCards(): array
    {
        return [
            Card::make('Male', Patient::query()->where('gender', 'male')->count()),
            Card::make('Female', Patient::query()->where('gender', 'female')->count()),
            Card::make('Unknown', Patient::query()->where('gender', 'unknown')->count()),
        ];
    }
}
