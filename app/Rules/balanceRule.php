<?php

namespace App\Rules;

use Illuminate\Contracts\Validation\Rule;
use App\Models\Canteen;

class balanceRule implements Rule
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
        return ($value <= Canteen::first()->balance);
    }

    /**
     * Get the validation error message.
     *
     * @return string
     */
    public function message()
    {
        return 'Inputted amount must be lower than the current balance!';
    }
}
