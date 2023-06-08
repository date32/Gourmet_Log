<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CateForm extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array|string>
     */
    public function rules(): array
    {
        return [
            'cateName' => 'required|string|max:10',
        ];
    }

    public function messages()
    {
        return [
            
            'cateName.required' => '必須項目です',
            'cateName.string' => '文字列ではありません',
            'cateName.max' => '１０文字以内で入力してください',
            
        ];
    }
}
