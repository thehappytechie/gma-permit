<?php

namespace App\Http\Requests;

use App\Models\User;
use Illuminate\Validation\Rule;
use Laravel\Fortify\Rules\Password;
use Illuminate\Foundation\Http\FormRequest;

class UserEdit extends FormRequest
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
            'name' =>  ["sometimes", "required", "string"],
            'email' =>  [($this->user) ? "sometimes" : "required", Rule::unique(User::class)->ignore($this->user)],
            'password' =>  ["sometimes", "string", new Password(), "confirmed", "nullable"],
            'disable_login' =>  ["boolean", "nullable"],
            'force_password_change' =>  ["boolean", "nullable"],
        ];
    }
}
