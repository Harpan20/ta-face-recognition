<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StorePromoClaimRequest extends FormRequest
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
            'company_name' => ['required'],
            'email' => ['required'],
            'country_id' => ['required', 'numeric', 'exists:countries,id'],
            'phone_number' => ['required', 'numeric', 'min_digits:5', 'max_digits:15'],
            'product_id' => ['required', 'numeric', 'exists:products,id'],
        ];
    }
}
