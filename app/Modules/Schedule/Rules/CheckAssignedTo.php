<?php

namespace App\Modules\Schedule\Rules;

use App\Modules\Schedule\Models\Schedule;
use App\Modules\Schedule\Services\ScheduleService;
use App\Modules\User\Enums\UserRoleEnum;
use Closure;
use Illuminate\Contracts\Validation\ValidationRule;

class CheckAssignedTo implements ValidationRule
{
    /**
     * Run the validation rule.
     *
     * @param  \Closure(string): \Illuminate\Translation\PotentiallyTranslatedString  $fail
     */
    public function validate(string $attribute, mixed $value, Closure $fail): void
    {
        if (auth()->user()->role === UserRoleEnum::DOCTOR->value) {
            $exists = Schedule::where('id', $value)->where('doctor_id', auth()->id())->exists();

            if (!$exists) {
                $fail('Schedule cannot be edited by another doctor.');
            }
        }
    }
}
