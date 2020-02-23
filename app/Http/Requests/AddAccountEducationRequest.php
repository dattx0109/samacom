<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Exceptions\HttpResponseException;
use Illuminate\Http\JsonResponse;

class AddAccountEducationRequest extends FormRequest
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
           'school' =>'required',
//           'filed_study' =>'required',
//           'degree' =>'required',
//           'description' =>'required',
//           'start_time'=>'required|before:today',
//           'end_time'=>'required|before:today',
        ];
    }

    public function messages()
    {
        return [
            'school.required'       =>'Không để trống trường này.',
            'filed_study.required'  =>'Không để trống trường này.',
            'degree.required'       =>'Không để trống trường này.',
            'description.required'  =>'Không để trống trường này.',
            'start_time.required'=>'Không để trống trường này.',
            'end_time.required'=>'Không để trống trường này.',
            'start_time.before'=>'Không được chọn ngày trước ngày hiện tại.',
            'end_time.before'=>'Không được chọn ngày trước ngày hiện tại.',
            'end_time.date_format'=>'Không đúng định dạng.',
            'start_time.date_format'=>'Không đúng định dạng.',
        ];
    }

    public function withValidator($validator)
    {
//        $validator->after(function ($validator) {
//            $errors = $validator->errors()->messages();
//
//            if(empty($errors['start_time']) &&  empty($errors['end_time'])){
//                if(strtotime(request()->start_time) > strtotime(request()->end_time) ){
//                    $errors['start_time']=['Ngày bắt đầu lớn hơn ngày kết thúc'];
//                }
//
//            }
//            if (!empty($errors)) {
//                throw new HttpResponseException(response()->json(
//                    [
//                        'error' => $errors,
//                        'status_code' => 422,
//                    ], JsonResponse::HTTP_UNPROCESSABLE_ENTITY));
//            }
//        });
    }
}
