<?php

namespace App\Rules;

use Illuminate\Contracts\Validation\Rule;
use App\Models\JobAssignment;

class UniqueAssignment implements Rule
{
    public function passes($attribute, $value)
    {
        // Validate that there is no assignment for the given user on the same date.
        return !JobAssignment::where('user_id', $value)
            ->whereDate('assignment_date', request()->input('assignment_date'))
            ->exists();
    }

    public function message()
    {
        return 'This user already has an assignment on the selected date.';
    }
}
