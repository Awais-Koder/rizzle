<?php

namespace App\Filament\Widgets;

use App\Models\Doctor;
use App\Models\Education;
use App\Models\EducationBranch;
use App\Models\Electronic;
use App\Models\ElectronicBranch;
use Filament\Widgets\StatsOverviewWidget as BaseWidget;
use Filament\Widgets\StatsOverviewWidget\Stat;

class StatsOverview extends BaseWidget
{
    protected function getStats(): array
    {
        return [
            Stat::make('Doctors', Doctor::all()->count()),
            Stat::make('Education', value: Education::all()->count()),
            Stat::make('Education Branches', value: EducationBranch::all()->count()),
            Stat::make('Electronics', value: Electronic::all()->count()),
            Stat::make('Electronic Branches', value: ElectronicBranch::all()->count()),
        ];
    }
}
