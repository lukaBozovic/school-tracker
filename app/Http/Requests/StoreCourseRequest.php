<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreCourseRequest extends FormRequest
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
            'semester' => 'required|integer|min:1|max:16',
            'description' => 'nullable|string|max:1000',
            'program_id' => 'required|integer|exists:programs,id'
        ];
    }
}
