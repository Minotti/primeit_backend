<?php

namespace App\Modules\Customer\Services;

use App\Modules\Customer\Repositories\CustomerRepository;
use App\Modules\Core\Services\Service;

class CustomerService extends Service
{
    public function repository(): string
    {
        return CustomerRepository::class;
    }
}
