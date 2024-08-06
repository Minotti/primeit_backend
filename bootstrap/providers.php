<?php

return [
    App\Providers\AppServiceProvider::class,
    \App\Modules\Core\Providers\CoreServiceProvider::class,
    \App\Modules\Auth\Providers\AuthServiceProvider::class,
    \App\Modules\Schedule\Providers\ScheduleServiceProvider::class,
    \App\Modules\Customer\Providers\CustomerServiceProvider::class,
    \App\Modules\Doctor\Providers\DoctorServiceProvider::class
];
