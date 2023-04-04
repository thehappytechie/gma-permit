<?php

namespace App\Http\Requests;

use Illuminate\Validation\Rule;
use Illuminate\Foundation\Http\FormRequest;

class PermitEdit extends FormRequest
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
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'company_id' =>  ["required", "exists:companies,id"],
            'permit_unit_id' =>  ["required", "exists:permit_units,id"],
            'permit_type' => ["required", "string", Rule::in(['safety permit', 'operating permit'])],
            'permit_number' =>  ["required", "string"],
            'vessel_name' => ["string", "nullable"],
            'registry_port' => ["string", "nullable"],
            'gross_tonnage' => ["string", "numeric", "nullable"],
            'imo_number' => ["string", "nullable"],
            'call_sign' => ["string", "nullable"],
            'expiry_date' =>  ["required", "date"],
            'issue_date' =>  ["required", "date"]
        ];
    }
}
