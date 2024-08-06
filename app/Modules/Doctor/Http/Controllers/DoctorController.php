<?php

namespace App\Modules\Doctor\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Modules\Doctor\Services\DoctorService;
use App\Modules\User\Resources\UserResource;

class DoctorController extends Controller
{
    public function __construct(protected DoctorService $service)
    {
    }

    public function index()
    {
        $doctors = $this->service->all();

        return $this->okResponse(UserResource::collection($doctors));
    }
}
