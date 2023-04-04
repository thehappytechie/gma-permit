<?php

namespace App\Http\Requests;

use App\Models\Department;
use Illuminate\Validation\Rule;
use Illuminate\Foundation\Http\FormRequest;

class DepartmentCreate extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'name' =>  ["required", "string", Rule::unique(Department::class)],
            'location_id' =>  ["required", "integer", "exists:locations,id"],
            'email' =>  ["required", "email", Rule::unique(Department::class)],
            'contact' =>  ["string", "nullable"],
            'designation' =>  ["string", Rule::in([
                'director', 'deputy director', 'principal officer',
                'senior officer', 'officer', 'assistant officer'
            ])],
            'manager' =>  ["required", "string"],
        ];
    }
}
