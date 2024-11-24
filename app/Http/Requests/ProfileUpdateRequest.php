<?php

namespace App\Http\Requests;

use App\Models\User;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class ProfileUpdateRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\Rule|array|string>
     */
    public function rules(): array
    {
        return [
            'name' => ['required', 'string', 'max:255'],
            'email' => [
                'required',
                'string',
                'lowercase',
                'email',
                'max:255',
                Rule::unique(User::class)->ignore($this->user()->id),
                'date_of_birth' => ['nullable', 'date'], // Allows for an optional date format
                'gender' => ['nullable', 'in:male,female,other'], // Allows only specified values
                'employed_company' => ['nullable', 'string', 'max:255'], // Optional string
                'employee_id' => ['nullable', 'string', 'max:255'], // Optional string
            ],
        ];
    }
}
