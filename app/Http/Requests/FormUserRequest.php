<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class FormUserRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'first_name' => 'required|string|max:128',
            'last_name' => 'required|string|max:128',
            'email' => 'required|email:rfc,dns,strict,spoof',
            'phone' => 'required|string|max:128',
            'country' => 'string|max:128',
            'state' => 'string|max:128',
            'issue' => 'string|max:128',
            'message' => 'string|max:128',
        ];
    }
}
