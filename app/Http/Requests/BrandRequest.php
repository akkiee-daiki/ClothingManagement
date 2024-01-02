<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class BrandRequest extends FormRequest
{
    public function rules($input)
    {
        return [
            'name' => [
                'required',
                'max:255',
                (isset($input['new']) ? Rule::unique('brand') : Rule::unique('brand')->ignore($input['brand_id'], 'brand_id'))
            ],
            'Japanese_name' => [
                'max:255',
                'nullable'
            ]
        ];
    }

    public function attributes()
    {
        return [
            'name' => '名前',
            'Japanese_name' => '日本語名',
        ];
    }
    public function messages()
    {
        return [
            'required' => ':attributeを入力してください。',
            'max' => ':attributeは:max文字以下で入力してください。',
            'unique' => 'すでに:attributeと同名のブランドが登録されています。'
        ];
    }
}
