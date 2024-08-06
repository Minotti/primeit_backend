<?php

namespace App\Modules\Customer\Repositories;

use App\Modules\Core\Repositories\Repository;
use App\Modules\Customer\Models\Customer;

class CustomerRepository extends Repository
{
    public function model(): string
    {
        return Customer::class;
    }
}
