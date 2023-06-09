<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreAddressRequest extends FormRequest
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
            'address' => ['required'],
            'province' => ['nullable'],
            'district' => ['nullable'],
            'sub_district' => ['nullable'],
            'postal_code' => ['nullable'],
            'longitude' => ['required'],
            'latitude' => ['required'],
            'is_main' => ['boolean'],
        ];
    }
}
