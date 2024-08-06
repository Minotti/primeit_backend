<?php

namespace App\Modules\Schedule\Http\Requests;

use App\Modules\Core\Http\Requests\BaseFormRequest;
use App\Modules\Schedule\Enums\SchedulePeriodEnum;
use Illuminate\Validation\Rule;
use Illuminate\Validation\Rules\Enum;

class ScheduleRequest extends BaseFormRequest
{

    public function prepareForValidation(): void
    {
        parent::prepareForValidation();

        $this->merge([
            'created_by' => auth()->id(),
        ]);
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array|string>
     */
    public function rules(): array
    {
        return [
            'created_by' => ['exists:users,id'],
            'customer_id' => ['required', 'exists:customers,id'],
            'animal_id' => [
                'required',
                Rule::exists('customer_animals', 'id')
                    ->where('customer_id', $this->customer_id)
            ],
            'symptoms' => ['required', 'string', 'max:255'],
            'scheduled_at' => ['required', 'date_format:Y-m-d'],
            'period' => ['required', new Enum(SchedulePeriodEnum::class)]
        ];
    }

    public function messages(): array
    {
        return [
            'animal_id.exists' => 'Animal does not belong to this customer.',
        ];
    }
}
