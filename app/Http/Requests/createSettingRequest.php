<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class createSettingRequest extends FormRequest
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
     * @return array
     */
    public function rules()
    {
        return [
            'name' => 'required|max:100',
        ];
    }

    public function messages()
    {
        return [
            'name.required' => '＊名前を入力してください。',
            'name.max' => '＊名前は100文字以内で入力してください。',
        ];
    }
}
