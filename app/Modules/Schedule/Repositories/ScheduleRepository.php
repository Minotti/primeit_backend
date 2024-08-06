<?php

namespace App\Modules\Schedule\Repositories;

use App\Modules\Core\Repositories\Repository;
use App\Modules\Schedule\Models\Schedule;

class ScheduleRepository extends Repository
{
    public function model(): string
    {
        return Schedule::class;
    }
}
