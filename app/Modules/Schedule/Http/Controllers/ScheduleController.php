<?php

namespace App\Modules\Schedule\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Modules\Schedule\Http\Requests\ScheduleDestroyRequest;
use App\Modules\Schedule\Http\Requests\ScheduleRequest;
use App\Modules\Schedule\Http\Requests\ScheduleUpdateRequest;
use App\Modules\Schedule\Http\Resources\ScheduleResource;
use App\Modules\Schedule\Services\ScheduleService;

class ScheduleController extends Controller
{
    public function __construct(protected ScheduleService $service)
    {
    }

    public function index(): \Illuminate\Http\JsonResponse
    {
        $month = request('month', now()->format('m'));
        $year = request('year', now()->format('Y'));
        $animalType = request('type');

        $schedules = $this->service->filter($month, $year, $animalType);
        return $this->okResponse(ScheduleResource::collection($schedules));
    }

    public function show($id): \Illuminate\Http\JsonResponse
    {
        $schedule = $this->service->find($id);

        return $this->okResponse(new ScheduleResource($schedule));
    }

    public function update($id, ScheduleUpdateRequest $request): \Illuminate\Http\JsonResponse
    {
        $schedule = $this->service->update($id, $request->validated());

        return $this->okResponse(new ScheduleResource($schedule));
    }

    public function store(ScheduleRequest $request): \Illuminate\Http\JsonResponse
    {
        $schedule = $this->service->create($request->validated());

        return $this->createdResponse(new ScheduleResource($schedule));
    }

    public function destroy($id, ScheduleDestroyRequest $request): \Illuminate\Http\JsonResponse
    {
        $this->service->delete($id);

        return $this->okResponse([], 'Schedule deleted successfully.');
    }
}
