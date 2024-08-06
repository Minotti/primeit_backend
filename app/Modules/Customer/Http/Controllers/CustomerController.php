<?php

namespace App\Modules\Customer\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Modules\Customer\Http\Requests\CustomerDestroyRequest;
use App\Modules\Customer\Http\Requests\CustomerRequest;
use App\Modules\Customer\Http\Requests\CustomerUpdateRequest;
use App\Modules\Customer\Http\Resources\CustomerResource;
use App\Modules\Customer\Services\CustomerService;

class CustomerController extends Controller
{
    public function __construct(protected CustomerService $service)
    {
    }

    public function index(): \Illuminate\Http\JsonResponse
    {
        $customers = $this->service->all();

        return $this->okResponse(CustomerResource::collection($customers));
    }

    public function show($id): \Illuminate\Http\JsonResponse
    {
        $customer = $this->service->find($id);

        return $this->okResponse(new CustomerResource($customer));
    }

    public function store(CustomerRequest $request): \Illuminate\Http\JsonResponse
    {
        $customer = $this->service->create($request->validated());

        return $this->createdResponse(new CustomerResource($customer));
    }

    public function update($id, CustomerUpdateRequest $request): \Illuminate\Http\JsonResponse
    {
        $customer = $this->service->update($id, $request->validated());

        return $this->okResponse(new CustomerResource($customer));
    }

    public function destroy($id, CustomerDestroyRequest $request): \Illuminate\Http\JsonResponse
    {
        $this->service->delete($id);

        return $this->okResponse([], 'Customer deleted successfully.');
    }
}
