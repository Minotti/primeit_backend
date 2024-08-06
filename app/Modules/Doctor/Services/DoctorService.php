<?php

namespace App\Modules\Doctor\Services;

use App\Modules\Doctor\Repositories\DoctorRepository;
use App\Modules\Core\Services\Service;

class DoctorService extends Service
{
    public function repository(): string
    {
        return DoctorRepository::class;
    }
}
