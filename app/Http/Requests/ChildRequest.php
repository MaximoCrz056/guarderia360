<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ChildRequest extends FormRequest
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
			'name' => 'required|string',
			'middlename' => 'required|string',
			'lastname' => 'required|string',
			'birthdate' => 'required',
			'parent_id' => 'required',
			'photo' => 'required|string',
			'gender' => 'required|string',
			'height' => 'required',
			'weight' => 'required',
			'description' => 'string',
        ];
    }
}
