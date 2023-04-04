<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CertificateEdit extends FormRequest
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
            'vessel_id' =>  ["required", "exists:vessels,id"],
            'name' =>  ["required", "string"],
            'issue_date' =>  ["required", "date"],
            'expiry_date' => ["required", "date"],
        ];
    }
}
