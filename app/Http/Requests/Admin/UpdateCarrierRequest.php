<?php

namespace App\Http\Requests\Admin;

use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class UpdateCarrierRequest extends FormRequest
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
        $id = $this->route('carrier');
        return [
            'name' => ['required','min:3','max:50', Rule::unique('carriers')->ignore($id)],
            'email' => ['required','email', Rule::unique('carriers')->ignore($id)],
            'phone' => ['required','regex:/^\+?[0-9\s\-]{6,15}$/', Rule::unique('carriers')->ignore($id)],
            'city' => 'required|exists:cities,id',
            'image' => 'image|mimes:jpeg,png,jpg|max:2048',
        ];
    }
}
