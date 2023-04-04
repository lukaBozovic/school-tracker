<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreProgramRequest extends FormRequest
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
     * @return array<string, \Illuminate\Contracts\Validation\Rule|array|string>
     */
    public function rules(): array
    {
        return [
            'name' => 'required|string|max:255',
            'ects' => 'required|integer|min:1|max:999',
            'number_of_years' => 'required|integer|min:1|max:8',
            'description' => 'nullable|string|max:1000',
            'program_type_id' => 'required|integer|exists:program_types,id',
            'faculty_id' => 'required|integer|exists:faculties,id',
        ];
    }
}
