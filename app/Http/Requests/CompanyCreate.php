<?php

namespace App\Http\Requests;

use App\Models\Company;
use Illuminate\Validation\Rule;
use Illuminate\Foundation\Http\FormRequest;

class CompanyCreate extends FormRequest
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
            'name' =>  ["required", "string", Rule::unique(Company::class)],
            'email' =>  ["string", "email", Rule::unique(Company::class), "nullable"],
            'contact' =>  ["string", "numeric", Rule::unique(Company::class), "nullable"],
            'address' =>  ["string", "nullable"],
            'registry_port' =>  ["string", "nullable"],
            'gross_tonnage' => ["numeric", "nullable"],
            'call_sign' => ["string", "nullable"],
            'vessel_number' => ["string", "nullable"],
            'imo_number' => ["string", "nullable"],
        ];
    }
}
