<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class BrandRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'name' => ['required', 'max:255']
        ];
    }

    public function attributes()
    {
        return [
          'name' => '名前'
        ];
    }
    public function messages()
    {
        return [
            'required' => ':attributeを入力してください。',
            'max' => ':attributeは:max文字以下で入力してください。'
        ];
    }
}
