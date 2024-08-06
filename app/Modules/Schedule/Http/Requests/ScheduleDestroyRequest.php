<?php

namespace App\Modules\Schedule\Http\Requests;

use App\Modules\Core\Http\Requests\BaseFormRequest;
use App\Modules\Schedule\Enums\SchedulePeriodEnum;
use App\Modules\Schedule\Rules\CheckAssignedTo;
use Illuminate\Validation\Rule;
use Illuminate\Validation\Rules\Enum;

class ScheduleDestroyRequest extends BaseFormRequest
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
        ];
    }

    public function messages(): array
    {
        return [
            'id.exists' => 'Schedule not found',
        ];
    }
}
