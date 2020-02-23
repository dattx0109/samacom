<?php
/**
 * Created by PhpStorm.
 * User: thanhvuminh
 * Date: 9/26/19
 * Time: 9:46 AM
 */

namespace App\Http\Requests;


use Illuminate\Foundation\Http\FormRequest;

class LoginRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }
    public function rules()
    {
        return [
            //'phone' =>['required','regex:/(084|\+84|09|0[1-9])+([0-9]{8})\b/iuU'],
            'phone'    => 'required',
            'password' => 'required|min:6'
        ];
    }

    public function messages()
    {
        return [
            'phone.required' => 'Email hoặc số điện thoại là trường bắt buộc',
            //'phone.regex'  => 'Sai định dạng',
            //'phone.min:10' => 'Số điện thoại nhiều nhất 10 số',
            'password.required' => 'Mật khẩu là trường bắt buộc',
            'password.min' => 'Mật khẩu phải chứa ít nhất 6 ký tự',
        ];
    }
}
