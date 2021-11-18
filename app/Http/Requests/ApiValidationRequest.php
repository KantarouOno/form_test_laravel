<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Http\Exceptions\HttpResponseException;

class ApiValidationRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'name' => 'required',
            'furigana' => 'required',
            'email' => 'required|email',
            'title' => 'required',
            'body'  => 'required',
        ];
    }

    protected function failedValidation(Validator $validator) {
        $res = response()->json([
            'errors' => $validator->errors(),
        ]);
        throw new HttpResponseException($res);
    }

}

