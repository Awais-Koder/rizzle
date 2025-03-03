<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UserStoreRequest extends FormRequest
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
     */
    public function rules(): array
    {
        return [
            'city_id' => ['integer', 'exists:cities,id'],
            'department_id' => ['nullable', 'integer', 'exists:departments,id'],
            'subdepartment_id' => ['nullable', 'integer', 'exists:sub_departments,id'],
            'name' => ['required', 'string'],
            'age' => ['required', 'integer'],
            'email' => ['nullable', 'email' , 'unique:users'],
            'gender' => ['required', 'string'],
            'password' => ['required' , 'min:8' , 'confirmed'],
            'phone_number' => ['required', 'string' , 'unique:users'],
            'type' => ['required', 'string'],
            'land' => ['nullable', 'string'],
            'animals' => ['nullable', 'string'],
            'card_status' => ['nullable', 'string'],
        ];
    }
}
