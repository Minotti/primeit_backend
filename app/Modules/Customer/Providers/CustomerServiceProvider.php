<?php

namespace App\Modules\Customer\Providers;

use App\Modules\Core\Providers\ModuleServiceProvider;

class CustomerServiceProvider extends ModuleServiceProvider
{
    protected string $moduleName = 'Customer';
    protected string $routePrefix = 'customers';
}
