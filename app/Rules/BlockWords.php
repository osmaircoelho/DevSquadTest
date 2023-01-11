<?php

namespace App\Rules;

use Illuminate\Contracts\Validation\Rule;

class BlockWords implements Rule
{
    /**
     * Create a new rule instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Determine if the validation rule passes.
     *
     * @param  string  $attribute
     * @param  mixed  $value
     * @return bool
     */
    public function passes($attribute, $value)
    {
        return strpos(strtoupper($value), 'SHIT') === false;
    }

    /**
     * Get the validation error message.
     *
     * @return string
     */
    public function message()
    {
        return "Bad word! Don't use SHIT. Please!!!";
    }
}
