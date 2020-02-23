<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RegisterRequest extends FormRequest
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
            'name'             => 'required|max:50',
            'email' =>['required','unique:accounts','regex:/^(([^<>()\[\]\\\\.,;:\s@"]+(\.[^<>()\[\]\\\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/'],
            'phone'            => [
                'required','unique:accounts','regex:/(084|\+84|09|0[1-9])+([0-9]{8})\b/iuU'
            ],
            'password'         => 'required|min:6',
            'confirm_password' => 'required|min:6|same:password',
        ];
    }

    public function messages()
    {
        return [

            'name.required'=>'Họ tên không được để trống',
            'name.max'=>'Họ tên không được để trống',
            'email.required'=>'Email không được để trống',
            'email.unique'=>'Email đã được đăng kí',
            'email.regex'=>'Định dạng email không đúng',
            'phone.required'=>'Số điện thoại không được để trống',
            'phone.unique'=>'Số điện thoại đã được đăng kí',
            'phone.regex'=>' Định dạng số điện thoại không đúng',
            'password.required'=>'Mật khẩu không được để trống',
            'password.min'=>'Mật khẩu phải nhiều hơn 6 kí tự',
            'confirm_password.required'=>'Mật khẩu không được để trống',
            'confirm_password.min'=>'Mật khẩu phải nhiều hơn 6 kí tự',
            'confirm_password.same'=>'Mật khẩu phải trùng nhau',
        ];
    }
}
