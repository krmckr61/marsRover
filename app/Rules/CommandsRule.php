<?php

namespace App\Rules;

use Illuminate\Contracts\Validation\Rule;

class CommandsRule implements Rule
{

    private $allowedCommands = ['L', 'R', 'M'];

    /**
     * Determine if the validation rule passes.
     *
     * @param  string  $attribute
     * @param  mixed  $value
     * @return bool
     */
    public function passes($attribute, $value)
    {
        $letters = str_split($value);
        if(count($letters) > 0) {
            foreach ($letters as $letter) {
                if(!in_array($letter, $this->allowedCommands)) {
                    return false;
                }
            }
            return true;
        }
        return false;
    }

    /**
     * Get the validation error message.
     *
     * @return string
     */
    public function message()
    {
        return 'Command string you\'ve sent may only ' . implode(', ', $this->allowedCommands) . ' in :attribute field.';
    }
}
