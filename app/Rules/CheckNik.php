<?php

namespace App\Rules;

// use Dotenv\Util\Str;
use Illuminate\Support\Str;
use Illuminate\Contracts\Validation\Rule;

class CheckNik implements Rule
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
        //
        if (Str::length($value) == 16) {
            return true;
        }
    }

    /**
     * Get the validation error message.
     *
     * @return string
     */
    public function message()
    {
        return 'Nomor Induk harus berjumlah 16 karakter';
    }
}
