<?php
namespace App\Http\Requests;

use Illuminate\Contracts\Validation\Validator;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;
use Illuminate\Validation\ValidationException;

class ApiFormRequest extends FormRequest {

    protected function failedValidation(Validator $validator)
    {
        $response = new Response(['errors' => $validator->errors()], 400);
        throw new ValidationException($validator, $response);
    }
}
