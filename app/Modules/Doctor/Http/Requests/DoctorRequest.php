<?php

namespace App\Modules\Doctor\Http\Requests;

use App\Modules\Core\Http\Requests\BaseFormRequest;

class DoctorRequest extends BaseFormRequest
{

    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array|string>
     */
    public function rules(): array
    {
        return [

        ];
    }
}
