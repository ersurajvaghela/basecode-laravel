<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class UpdateUserRequest extends FormRequest {

    public function authorize() {
        return true;
    }

    public function rules() {
        return [
            'name' => 'sometimes|required|string|max:255',
            'email' => [
                'sometimes',
                'required',
                'email',
                Rule::unique('users')->ignore($this->route('user'))
            ],
            'password' => 'sometimes|min:8|confirmed',
            'phone' => 'sometimes|nullable|string|regex:/^([0-9\s\-\+\(\)]*)$/',
            'is_active' => 'sometimes|boolean',
        ];
    }

}
