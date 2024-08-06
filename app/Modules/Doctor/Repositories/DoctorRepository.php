<?php

namespace App\Modules\Doctor\Repositories;

use App\Modules\Core\Repositories\Repository;
use App\Modules\Doctor\Models\Doctor;

class DoctorRepository extends Repository
{
    public function model(): string
    {
        return Doctor::class;
    }
}
