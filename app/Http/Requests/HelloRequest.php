<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class HelloRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        if($this -> path() == 'create'){
            return true;
        }else{
        return false;
        }
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'name' => 'required',
            'mail' => 'email',
            'age' => 'required|integer|numeric|between:0,150|unique:users,mail',
            'gender' => 'required',

        ];
    }
    // ,'.Auth::user()->id.',id
    public function messages(){
        return[
        'name.required' => '名前が入力されていません。',
        'mail.email'    => 'メールアドレスが入力されていません。',
        'mail.unique'    => 'そのメールアドレスは重複しています。',
        'age.required'  => '年齢が入力されていません。',
        'age.integer'   => '年齢が整数で入力されていません。',
        'age.numeric'   => '年齢が数値で入力されていません。',
        'age.between' => '年齢は0~150の間で入力してください。',
        'gender.required'   => '性別が選択されていません。',


        ];

    }
}
