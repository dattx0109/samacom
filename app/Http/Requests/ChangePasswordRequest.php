<?php
namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ChangePasswordRequest extends FormRequest
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
            'password'=>'required|',
            'password_new'=>'required|',
            'password_confirm'=>'required|same:password_new',
        ];
    }
    public function withValidator($validator)
    {

        $validator->after(function ($validator) {
            if (!\Hash::check(request()->password, request()->user->password))
            {
                $validator->errors()->add('password', 'Password cũ không đúng.');
            }
        });
    }

    public function messages()
    {
        return [
            'password.required' => 'Không để trống trường này',
            'password_new.required'  => 'Không để trống trường này',
            'password_confirm.required'  => 'Không để trống trường này',
            'password_confirm.same'  => 'Xác nhận mật khẩu không đúng ',
        ];
    }
}
