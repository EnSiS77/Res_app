<?php

namespace App\Rules;

use Carbon\Carbon;
use Illuminate\Contracts\Validation\Rule;

class TimeBetween implements Rule
{
    /**
     * Determine if the validation rule passes.
     *
     * @param  string  $attribute
     * @param  mixed  $value
     * @return bool
     */
    public function passes($attribute, $value)
    {
        $pickupDateTime = Carbon::parse($value);
        $earliestDateTime = Carbon::parse('17:00:00');
        $latestDateTime = Carbon::parse('23:00:00');
    
        $pickupDate = $pickupDateTime->format('Y-m-d');
        $earliestDateTime->setDate($pickupDateTime->year, $pickupDateTime->month, $pickupDateTime->day);
        $latestDateTime->setDate($pickupDateTime->year, $pickupDateTime->month, $pickupDateTime->day);
    
        return $pickupDateTime->between($earliestDateTime, $latestDateTime);
    }

    /**
     * Get the validation error message.
     *
     * @return string
     */
    public function message()
    {
        return 'Пожалуйста, выберите время между 17:00 и 23:00.';
    }
}
