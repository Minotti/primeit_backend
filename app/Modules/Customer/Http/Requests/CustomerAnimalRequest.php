<?php

namespace App\Modules\Customer\Http\Requests;

use App\Modules\Core\Http\Requests\BaseFormRequest;
use App\Modules\Customer\Enums\AnimalTypeEnum;
use Illuminate\Validation\Rules\Enum;

class CustomerAnimalRequest extends BaseFormRequest
{
    public function prepareForValidation(): void
    {
        parent::prepareForValidation();

        $this->merge([
            'customer_id' => (int) $this->customerId
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
            'name' => ['required', 'string', 'max:100'],
            'customer_id' => ['required', 'exists:customers,id'],
            'age' => ['required'],
            'type' => ['required', new Enum(AnimalTypeEnum::class)],
        ];
    }
}
