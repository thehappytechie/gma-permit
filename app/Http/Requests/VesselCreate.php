<?php

namespace App\Http\Requests;

use App\Models\Vessel;
use Illuminate\Validation\Rule;
use Illuminate\Foundation\Http\FormRequest;

class VesselCreate extends FormRequest
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
            'name' =>  ["required", "string", Rule::unique(Vessel::class)],
            'vessel_type' =>  ["string", "nullable"],
            'flag' =>  ["string", "nullable"],
            'registry_port' =>  ["string", "nullable"],
            'call_sign' =>  ["numeric", "nullable"],
            'gross_tonnage' => ["numeric", "nullable"],
            'owner_details' => ["string", "nullable"],
        ];
    }
}
