<?php

namespace App\Modules\Schedule\Services;

use App\Modules\Schedule\Repositories\ScheduleRepository;
use App\Modules\Core\Services\Service;
use App\Modules\User\Enums\UserRoleEnum;
use Carbon\Carbon;

class ScheduleService extends Service
{
    public function repository(): string
    {
        return ScheduleRepository::class;
    }

    public function filter(string $month, string $year, ?string $type = null)
    {
        $date = Carbon::createFromFormat('Ym', $year . $month);
        $startOfMonth = $date->copy()->startOfMonth();
        $endOfMonth = $date->copy()->endOfMonth();
        $role = auth()->user()->role;

        return $this->repository->model
            ->whereBetween('scheduled_at', [$startOfMonth, $endOfMonth])
            ->when($role == UserRoleEnum::DOCTOR->value, fn ($query) => $query->where('doctor_id', auth()->user()->id))
            ->when($type && $type != 'ALL', function ($query) use ($type) {
                $query->whereHas('animal', fn ($query) =>$query->where('type', $type));
            })
            ->get();
    }
}
