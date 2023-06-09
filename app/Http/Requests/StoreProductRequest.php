<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreProductRequest extends FormRequest
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
            'description' => ['required', 'string'],
            'features' => ['required', 'array'],
            'features.*' => ['exists:features,id'],
            'benefits' => ['required', 'array'],
            'benefits.*' => ['exists:benefits,id'],
            'advantages' => ['required', 'array'],
            'advantages.*' => ['exists:advantages,id'],
            'supports' => ['required', 'array'],
            'supports.*' => ['exists:supports,id'],
            'faqs' => ['required', 'array'],
            'faqs.*' => ['exists:faqs,id'],
            'image_hero' => ['required', 'image', 'mimes:png,jpg,jpeg,svg', 'max:2048'],
            'image_feature' => ['required', 'image', 'mimes:png,jpg,jpeg,svg', 'max:2048'],
            'image_benefit' => ['required', 'image', 'mimes:png,jpg,jpeg,svg', 'max:2048'],
            'image_benefit_mobile' => ['required', 'image', 'mimes:png,jpg,jpeg,svg', 'max:2048'],
        ];
    }
}
