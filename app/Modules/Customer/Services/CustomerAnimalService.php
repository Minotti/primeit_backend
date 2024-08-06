<?php

namespace App\Modules\Customer\Services;

use App\Modules\Customer\Repositories\CustomerAnimalRepository;
use App\Modules\Core\Services\Service;

class CustomerAnimalService extends Service
{
    public function repository(): string
    {
        return CustomerAnimalRepository::class;
    }
}
