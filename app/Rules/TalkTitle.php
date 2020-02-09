<?php

namespace App\Rules;

use Illuminate\Contracts\Validation\Rule;
use App\Models\Talk;

class TalkTitle implements Rule
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
        return preg_match_all('/[1-9]\d*|0\d+|' . Talk::LIGHTNING_STR . '/', $value) == 1;
    }

    /**
     * Get the validation error message.
     *
     * @return string
     */
    public function message()
    {
        return 'Invalid title.';
    }
}
