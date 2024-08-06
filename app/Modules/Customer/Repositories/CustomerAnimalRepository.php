<?php

namespace App\Modules\Customer\Repositories;

use App\Modules\Core\Repositories\Repository;
use App\Modules\Customer\Models\CustomerAnimal;

class CustomerAnimalRepository extends Repository
{
    public function model(): string
    {
        return CustomerAnimal::class;
    }
}
