<?php

namespace App\Rules;

use Illuminate\Contracts\Validation\Rule;

use Carbon\Carbon;

class BirthdayRule implements Rule
{

    private $afterOrEqualDate;
    private $beforeOrEqualDate;
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
       $this->afterOrEqualDate = Carbon::now()->subYears(100);
       $this->beforeOrEqualDate = Carbon::now()->subYears(12);
       $birthday = Carbon::parse($value)->format("Y-m-d");
       return ($birthday >= $this->afterOrEqualDate && $birthday <= $this->beforeOrEqualDate);
       
    }

    /**
     * Get the validation error message.
     *
     * @return string
     */
    public function message()
    {
        return `Birthday should be after or equal {$this->afterOrEqualDate} and before or equal {$this->beforeOrEqualDate}`;
    }
}
