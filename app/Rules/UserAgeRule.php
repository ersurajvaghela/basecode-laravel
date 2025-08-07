<?php

namespace App\Rules;

use Illuminate\Contracts\Validation\Rule;

class UserAgeRule implements Rule {

    public function passes($attribute, $value) {
        return $value >= 18;
    }

    public function message() {
        return 'You must be at least 18 years old.';
    }

}
