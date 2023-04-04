<?php

namespace App\Http\Requests;

use App\Models\Department;
use Illuminate\Validation\Rule;
use Illuminate\Foundation\Http\FormRequest;

class DepartmentEdit extends FormRequest
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
            'name' =>  ["required", "string", Rule::unique(Department::class)->ignore(request()->department)],
            'location_id' =>  ["integer", "exists:locations,id", "nullable"],
            'email' =>  ["required", "email", Rule::unique(Department::class)->ignore(request()->department)],
            'contact' =>  ["string", "nullable"],
            'designation' =>  ["string", Rule::in([
                'director', 'deputy director', 'principal officer',
                'senior officer', 'officer', 'assistant officer'
            ])],
            'manager' =>  ["required", "string"],
        ];
    }
}
