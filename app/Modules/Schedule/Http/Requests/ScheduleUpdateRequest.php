<?php

namespace App\Modules\Schedule\Http\Requests;

use App\Modules\Core\Http\Requests\BaseFormRequest;
use App\Modules\Schedule\Enums\SchedulePeriodEnum;
use App\Modules\Schedule\Rules\CheckAssignedTo;
use App\Modules\User\Enums\UserRoleEnum;
use Illuminate\Validation\Rule;
use Illuminate\Validation\Rules\Enum;

class ScheduleUpdateRequest extends BaseFormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array|string>
     */
    public function rules(): array
    {
        return [
            'id' => ['required', 'exists:schedules,id', new CheckAssignedTo],
            'customer_id' => ['sometimes', 'exists:customers,id'],
            'doctor_id' => [
                'sometimes',
                Rule::exists('users', 'id')
                    ->where('role', UserRoleEnum::DOCTOR)
            ],
            'animal_id' => [
                'sometimes',
                Rule::exists('customer_animals', 'id')
                    ->where('customer_id', $this->customer_id)
            ],
            'symptoms' => ['sometimes', 'string', 'max:255'],
            'scheduled_at' => ['sometimes', 'date_format:Y-m-d'],
            'period' => ['sometimes', new Enum(SchedulePeriodEnum::class)]
        ];
    }

    public function messages(): array
    {
        return [
            'id.exists' => 'Schedule not found',
            'animal_id.exists' => 'Animal does not belong to this customer.',
            'doctor_id.exists' => 'User not found or is not a doctor',
        ];
    }
}
