<?php

namespace App\Http\Requests\Rover;

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
            'plateau_id' => 'required|numeric',
            'x' => $coordinateRules,
            'y' => $coordinateRules,
            'd' => 'required|in:N,S,W,E'
        ];
    }
}
