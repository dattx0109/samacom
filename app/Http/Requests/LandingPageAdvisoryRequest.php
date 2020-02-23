<?php


namespace App\Http\Requests;


use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Exceptions\HttpResponseException;
use Illuminate\Http\JsonResponse;

class LandingPageAdvisoryRequest extends FormRequest
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
            'name_company'  =>'required',

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
            'name_company.required'  =>'Không để trống trường này.',
        ];
    }
    public function withValidator($validator)
    {
        $validator->after(function ($validator) {
            $errors = $validator->errors()->messages();
            if (!empty($errors)) {
                throw new HttpResponseException(response()->json(
                    [
                        'error' => $errors,
                        'status_code' => 422,
                    ], JsonResponse::HTTP_UNPROCESSABLE_ENTITY));
            }
        });
    }
}
