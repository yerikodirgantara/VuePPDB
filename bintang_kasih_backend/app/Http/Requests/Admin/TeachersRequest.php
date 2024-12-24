<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;

class TeachersRequest extends FormRequest
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
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'fullName' => 'required|max:255',
            'shortName' => 'required|max:255',
            'gender' => 'required|max:255',
            'birthPlace' => 'required|max:255',
            'birthDate' => 'required|date',
            'phone' => 'required|max:255',
            'lastEdu' => 'required|max:255',
            'address' => 'required|max:255'
        ];
    }
}
