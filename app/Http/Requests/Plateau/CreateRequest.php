<?php

namespace App\Http\Requests\Plateau;

use App\Http\Requests\ApiFormRequest;

class CreateRequest extends ApiFormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        $coordinateRules = getCoordinateValidationRules();
        return [
            'x' => $coordinateRules,
            'y' => $coordinateRules
        ];
    }
}
