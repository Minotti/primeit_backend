<?php

namespace App\Modules\Doctor\Providers;

use App\Modules\Core\Providers\ModuleServiceProvider;

class DoctorServiceProvider extends ModuleServiceProvider
{
    protected string $moduleName = 'Doctor';
    protected string $routePrefix = 'doctors';
}
