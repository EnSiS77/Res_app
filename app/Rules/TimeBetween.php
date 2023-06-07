<?php

namespace App\Rules;

use Carbon\Carbon;
use Closure;
use Illuminate\Contracts\Validation\ValidationRule;

class TimeBetween implements ValidationRule
{
    /**
     * Run the validation rule.
     *
     * @param  string  $attribute
     * @param  mixed  $value
     * @param  \Closure(string): \Illuminate\Translation\PotentiallyTranslatedString  $fail
     * @return void
     */
    public function validate($attribute, $value, $fail): void
    {
        $pickupTime = Carbon::parse($value)->setDate(0, 0, 0); // Устанавливаем дату на 0, чтобы сравнивать только время

        // Когда ресторан открыт
        $earliestTime = Carbon::createFromTimeString('17:00:00');
        $lastTime = Carbon::createFromTimeString('23:00:00');

        if (!$pickupTime->between($earliestTime, $lastTime)) {
            $fail('Пожалуйста, выберите время между 17:00-23:00.');
        }
    }

}
