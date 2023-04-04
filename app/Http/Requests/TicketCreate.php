<?php

namespace App\Http\Requests;

use App\Models\Ticket;
use Illuminate\Validation\Rule;
use Illuminate\Foundation\Http\FormRequest;

class TicketCreate extends FormRequest
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
            'title' =>  ["required", Rule::unique(Ticket::class)],
            'comment' =>  ["required", "string"],
            'category' =>  ["required",  Rule::in(['bug', 'technical issue', 'feature request'])],
            'priority' =>  ["required", Rule::in(['low', 'medium', 'high'])],
        ];
    }
}
