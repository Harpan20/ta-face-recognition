<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateWhatsappRequest extends FormRequest
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
            'country_id' => ['required', 'numeric', 'exists:countries,id'],
            'number' => ['required', 'numeric', 'min_digits:5', 'max_digits:15', 'unique:whatsapps,number,except,id'],
            'is_main' => ['boolean'],
        ];
    }
}
