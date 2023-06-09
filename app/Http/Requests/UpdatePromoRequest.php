<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdatePromoRequest extends FormRequest
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
            'name' => ['required', 'string'],
            'image_desktop' => ['nullable', 'image', 'mimes:png,jpg,jpeg,svg', 'max:2048'],
            'image_mobile' => ['nullable', 'image', 'mimes:png,jpg,jpeg,svg', 'max:2048'],
            'started_at' => ['required', 'date'],
            'ended_at' => ['required', 'date'],
            'is_publish' => ['boolean'],
        ];
    }
}
