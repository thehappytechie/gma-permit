<?php

namespace App\Http\Requests;

use App\Models\Location;
use Illuminate\Validation\Rule;
use Illuminate\Foundation\Http\FormRequest;

class LocationEdit extends FormRequest
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
            'name' =>  ["required", "string", Rule::unique(Location::class)->ignore(request()->location)],
            'address' =>  ["string", "nullable"],
            'city' =>  ["string", "nullable"],
            'state' =>  ["string", "nullable"],
            'country' => ["required", "string"],
        ];
    }
}
