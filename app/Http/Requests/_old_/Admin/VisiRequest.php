<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;

class VisiRequest extends FormRequest
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
            'title' => ['required', 'min:3'],
            'body' => ['required'],
        ];
    }

    public function messages()
    {
        return [
            'title.required' => '* Judul wajib diisi',
            'title.min' => '* Judul harus diisi minimal :min karakter',
            'body.required' => '* Konten wajib diisi'
        ];
    }
}
