<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class Form extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
        // return false;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array|string>
     */
    public function rules(): array
    {
        return [
            'name' => 'required|string|max:20',
            'name_katakana' => 'required|string|max:20',
            'category_name' => 'required|string|max:20',
            'review' => 'required|string|max:20',
            'map_url' => 'nullable|string|regex:/^<iframe.*<\/iframe>$/s',
            'tel' => 'nullable|regex:/^[0-9]{2,4}-[0-9]{2,4}-[0-9]{2,4}$/',
            'comment' => 'nullable|string|max:200',
        ];
    }

    public function messages()
    {
        return [
            'name.required' => '必須項目です',
            'name.string' => '文字列ではありません',
            'name.max' => '２０文字以内で入力してください',
            'name_katakana.required' => '必須項目です',
            'name_katakana.string' => '文字列ではありません',
            'name_katakana.max' => '２０文字以内で入力してください',
            'category_name.required' => '必須項目です',
            'review.required' => '必須項目です',
            'cateName.required' => '必須項目です',
            'cateName.string' => '文字列ではありません',
            'cateName.max' => '１０文字以内で入力してください',
            'map_url.string' => '文字列ではありません',
            'map_url.regex' => '入力が正しくありません',
            'tel.regex' => 'ハイフン（-）が必要です',
            'comment.string' => '文字列ではありません',
            'comment.max' => '２０文字以内で入力してください',
        ];
    }
}
