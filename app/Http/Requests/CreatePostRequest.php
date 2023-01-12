<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CreatePostRequest extends FormRequest
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
            'name'          => 'required | max:30',
            'description'   => 'max:500',
        ];
    }

    public function messages()
    {
        return[
            'name.required'     => 'タイトルは入力必須です。',
            'name.max'          => 'タイトルは30文字以内で入力してください。',
            'description.max'   => '説明は500文字以内で入力してください。',
        ];
    }
}
