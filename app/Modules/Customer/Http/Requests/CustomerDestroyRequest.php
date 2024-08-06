<?php

namespace App\Modules\Customer\Http\Requests;

use App\Modules\Core\Http\Requests\BaseFormRequest;

class CustomerDestroyRequest extends BaseFormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array|string>
     */
    public function rules(): array
    {
        return [
            'id' => ['required', 'exists:customers,id']
        ];
    }

    public function messages(): array
    {
        return [
            'id.exists' => 'Customer not found.'
        ];
    }
}
