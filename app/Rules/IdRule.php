<?php

namespace App\Rules;

use Illuminate\Contracts\Validation\Rule;

class IdRule implements Rule
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
        $first = 0;
        for ($i = 0; $i < 3; $i++) {
            $first += (int) $value[$i];
        }
        $last = (int) $value[3] * 10 + $value[4];
        return ($first == $last);
    }

    /**
     * Get the validation error message.
     *
     * @return string
     */
    public function message()
    {
        return 'The two last digits must be the sum of three first digits!';
    }
}
