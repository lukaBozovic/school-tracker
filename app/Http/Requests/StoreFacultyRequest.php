<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreFacultyRequest extends FormRequest
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
            'name' => 'required|string|max:250|min:3', // ['required', 'string', 'max:250', 'min:3'] is also valid
            'city' => 'required|string|max:250|min:3',
            'country' => 'required|string|max:250|min:3',
            'description' => 'nullable|string|max:500|min:3',
            'year_of_foundation' => 'nullable|integer|min:0|max:2030'
        ];
    }
}
