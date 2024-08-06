<?php

namespace App\Modules\Customer\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Modules\Customer\Http\Requests\CustomerAnimalDestroyRequest;
use App\Modules\Customer\Http\Requests\CustomerAnimalRequest;
use App\Modules\Customer\Http\Requests\CustomerAnimalUpdateRequest;
use App\Modules\Customer\Http\Resources\CustomerAnimalResource;
use App\Modules\Customer\Services\CustomerAnimalService;

class CustomerAnimalController extends Controller
{
    public function __construct(protected CustomerAnimalService $service)
    {
    }

    public function index(): \Illuminate\Http\JsonResponse
    {
        $animals = $this->service->all();

        return $this->okResponse(CustomerAnimalResource::collection($animals));
    }

    public function show($id): \Illuminate\Http\JsonResponse
    {
        $animal = $this->service->find($id);

        return $this->okResponse($animal);
    }

    public function store(CustomerAnimalRequest $request): \Illuminate\Http\JsonResponse
    {
        $animal = $this->service->create($request->validated());

        return $this->createdResponse(new CustomerAnimalResource($animal));
    }

    public function update($id, CustomerAnimalUpdateRequest $request): \Illuminate\Http\JsonResponse
    {
        $animal = $this->service->update($id, $request->validated());

        return $this->okResponse(new CustomerAnimalResource($animal));
    }

    public function destroy($customerId, $id, CustomerAnimalDestroyRequest $request): \Illuminate\Http\JsonResponse
    {
        $this->service->delete($id);

        return $this->okResponse([], 'Animal deleted successfully.');
    }
}
