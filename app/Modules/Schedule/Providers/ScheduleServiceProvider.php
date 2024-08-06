<?php

namespace App\Modules\Schedule\Providers;

use App\Modules\Core\Providers\ModuleServiceProvider;

class ScheduleServiceProvider extends ModuleServiceProvider
{
    protected string $moduleName = 'Schedule';
    protected string $routePrefix = 'schedules';
}
