<?php

namespace App\Modules\Core\Http\Requests;

use Illuminate\Contracts\Validation\Validator;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Exceptions\HttpResponseException;
use Illuminate\Support\Str;

class BaseFormRequest extends FormRequest
{
    protected array $unmergeParams = [];

    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize(): bool
    {
        return true;
    }

    public function prepareForValidation(): void
    {
        parent::prepareForValidation();

        foreach ($this->route()->parameters as $parameter => $value) {
            if (!in_array($parameter, $this->unmergeParams)) {
                $this->merge([Str::snake($parameter) => $value]);
            }
        }
    }

    public function failedValidation(Validator $validator)
    {
        throw new HttpResponseException(response()->json([
            'error' => true,
            'data' => $this->serializeErrors($validator)
        ], 422));
    }

    private function serializeErrors(Validator $validator)
    {
        $erros = [];
        foreach ($validator->errors()->messages() as $key => $message) {
            $erros[$key] = $message[0];
        }

        return $erros;
    }
}
