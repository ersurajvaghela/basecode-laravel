<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreUserRequest extends FormRequest {

    public function authorize() {
        return true;
    }

    public function rules() {
        return [
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|min:8|confirmed',
            'phone' => 'nullable|string|regex:/^([0-9\s\-\+\(\)]*)$/',
            'is_active' => 'sometimes|boolean',
        ];
    }

    public function messages() {
        return [
            'email.unique' => 'This email is already registered.',
            'password.confirmed' => 'Password confirmation does not match.',
            'phone.regex' => 'Phone number format is invalid.',
        ];
    }

    protected function prepareForValidation() {
        $this->merge([
            'email' => strtolower($this->email),
        ]);
    }

}
