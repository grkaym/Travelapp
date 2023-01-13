<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CreatePlaceRequest extends FormRequest
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
            'address'       => 'required | max:80',
            'description'   => 'max:500',
        ];
    }

    public function messages()
    {
        return[
            'name.required'     => '名前は入力必須です。',
            'name.max'          => '名前は30文字以内で入力してください。',
            'address.required'  => '住所は入力必須です。',
            'address.max'       => '住所は80文字以内で入力してください。',
            'description.max'   => '説明は500文字以内で入力してください。',
        ];
    }
}
