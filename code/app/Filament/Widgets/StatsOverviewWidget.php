<?php

namespace App\Filament\Widgets;
use App\Models\User;
use App\Models\post;
use App\Models\comment;
use Filament\Widgets\StatsOverviewWidget as BaseWidget;
use Filament\Widgets\StatsOverviewWidget\Stat;

class StatsOverviewWidget extends BaseWidget
{
    protected function getStats(): array
    {
        return [
            Stat::make('Total Users', User::count()),
            Stat::make('Total Posts', post::count()),
            Stat::make('Total Comments', comment::count()),
            
        ];
    }
}
