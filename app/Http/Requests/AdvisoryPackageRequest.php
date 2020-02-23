<?php


namespace App\Http\Requests;


use Illuminate\Foundation\Http\FormRequest;


class AdvisoryPackageRequest extends FormRequest
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
            'name'          =>'required|',
            'email'         =>['required','regex:/^(([^<>()\[\]\\\\.,;:\s@"]+(\.[^<>()\[\]\\\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/'],
            'phone'         => [
                'required','regex:/(084|\+84|09|0[1-9])+([0-9]{8})\b/iuU'
            ],

        ];
    }
    public function messages()
    {
        return [
            'name.required'          =>'Không để trống trường này.',
            'email.required'         =>'Không để trống trường này.',
            'email.regex'            =>'Định dạng email không đúng.',
            'phone.required'         =>'Không để trống trường này.',
            'phone.regex'            =>'Định dạng số điện thoại không đúng.',
        ];
    }

}
