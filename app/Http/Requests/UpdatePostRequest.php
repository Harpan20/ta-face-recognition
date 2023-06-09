<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdatePostRequest extends FormRequest
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
            'title' => ['required', 'string'],
            'post_type_id' => ['required', 'numeric', 'exists:post_types,id'],
            'category_id' => ['required', 'numeric', 'exists:categories,id'],
            'tags' => ['required', 'array'],
            'tags.*' => ['exists:tags,id'],
            'body' => ['required'],
            'image_hero' => ['nullable', 'image', 'mimes:png,jpg,jpeg,svg', 'max:2048'],
            'image_l' => ['nullable', 'image', 'mimes:png,jpg,jpeg,svg', 'max:2048'],
            'image_s' => ['nullable', 'image', 'mimes:png,jpg,jpeg,svg', 'max:2048'],
            'published_at' => ['required', 'date'],
            'is_publish' => ['boolean'],
        ];
    }
}
