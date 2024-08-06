<?php

namespace App\Modules\Customer\Http\Requests;

use App\Modules\Core\Http\Requests\BaseFormRequest;
use App\Modules\Customer\Enums\AnimalTypeEnum;
use Illuminate\Validation\Rule;
use Illuminate\Validation\Rules\Enum;

class CustomerAnimalDestroyRequest extends BaseFormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array|string>
     */
    public function rules(): array
    {
        return [
            'id' => [
                'required',
                Rule::exists('customer_animals', 'id')
                ->where('customer_id', $this->customerId)
            ]
        ];
    }

    public function messages(): array
    {
        return [
            'id.exists' => 'Animal not found.',
        ];
    }
}
