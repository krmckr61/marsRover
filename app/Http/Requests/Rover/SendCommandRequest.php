<?php

namespace App\Http\Requests\Rover;

use App\Http\Requests\ApiFormRequest;
use App\Rules\CommandsRule;

class SendCommandRequest extends ApiFormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'commands' => ['required', new CommandsRule]
        ];
    }
}
