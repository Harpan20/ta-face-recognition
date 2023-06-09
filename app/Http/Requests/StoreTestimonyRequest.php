<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreTestimonyRequest extends FormRequest
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
            'name' => ['required'],
            'position' => ['required'],
            'origin' => ['required'],
            'testimony' => ['required'],
            'image' => ['required', 'image', 'mimes:png,jpg,jpeg,svg', 'max:2048'],
        ];
    }
}
