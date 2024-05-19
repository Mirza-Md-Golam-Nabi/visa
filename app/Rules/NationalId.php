<?php

namespace App\Rules;

use Closure;
use Illuminate\Contracts\Validation\ValidationRule;

class NationalId implements ValidationRule
{
    /**
     * Run the validation rule.
     *
     * @param  \Closure(string): \Illuminate\Translation\PotentiallyTranslatedString  $fail
     */
    public function validate(string $attribute, mixed $value, Closure $fail): void
    {
        $length = strlen($value);
        if (!($length == 10 || $length == 13 || $length == 17)) {
            $fail('The :attribute must be 10, 13 or 17 digits');
        }
    }
}
