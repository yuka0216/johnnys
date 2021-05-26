<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class createThreadRequest extends FormRequest
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
            'thread_name' => 'required|max:20',
            'artist_id' => 'required',
        ];
    }

    public function messages()
    {
        return [
            'thread_name.required' => '＊スレッドタイトルに入力が必要です。',
            'thread_name.max' => '＊スレッドタイトルは20文字以内で入力してください',
            'artist_id.required' => '＊誰の話題か最低一つは選択してください。',
        ];
    }
}
