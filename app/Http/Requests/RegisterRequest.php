<?php

namespace App\Http\Requests;

use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Foundation\Http\FormRequest;

class RegisterRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'first_name' => 'required|string|regex:/^[A-Z][a-z]{2,15}$/',
            'last_name' => 'required|string|regex:/^[A-Z][a-z]{2,15}$/',
            'email' => 'required|string|email|max:40|unique:users,email',
            'password' => 'required|string|confirmed|regex:/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[^A-Za-z\d]).{8,}$/'
        ];
    }
    public function messages(): array
    {
        return [
            'password.regex' => 'Password must be at least 8 characters long and include uppercase and lowercase letters, a number, and a special character'
        ];
    }
}
