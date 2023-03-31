<?php

namespace App\Rules\Ship24;

use Closure;
use Illuminate\Contracts\Validation\ValidationRule;

class TrackingNumber implements ValidationRule
{
    public const MIN_LENGTH = 5;

    public const MAX_LENGTH = 50;

    public const PATTERN = '/^[a-zA-Z0-9-]*$/';

    /**
     * Run the validation rule.
     *
     * @param  Closure(string): \Illuminate\Translation\PotentiallyTranslatedString  $fail
     */
    public function validate(string $attribute, mixed $value, Closure $fail): void
    {
        $this->passesLengthCheck($attribute, $value, $fail);
        $this->passesPatternMatch($attribute, $value, $fail);
    }

    private function passesLengthCheck(string $attribute, string $value, Closure $fail): void
    {
        if (strlen($value) < static::MIN_LENGTH) {
            $fail('Your :attribute must be at least ' . static::MIN_LENGTH . ' characters');
        }

        if (strlen($value) > static::MAX_LENGTH) {
            $fail('Your :attribute must be less than ' . static::MAX_LENGTH . ' characters');
        }
    }

    private function passesPatternMatch(string $attribute, string $value, Closure $fail): void
    {
        if (! preg_match(static::PATTERN, $value)) {
            $fail('The :attribute format is invalid');
        }
    }
}
