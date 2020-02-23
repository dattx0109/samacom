<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Exceptions\HttpResponseException;
use Illuminate\Http\JsonResponse;

class AddAccountExperienceRequest extends FormRequest
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
//            'start_time'    =>'required|date_format:"d-m-Y"|before:today',
//            'end_time'      =>'required|date_format:"d-m-Y"',
            'position'      =>'required',
            'company'       =>'required',
            'field_work'    =>'required',
            'description'   =>'required',

        ];
    }
    public function messages()
    {
        return [
            'start_time.required'       =>'Không để trống trường này.',
            'end_time.required'         =>'Không để trống trường này.',
            'position.required'         =>'Không để trống trường này.',
            'company.required'          =>'Không để trống trường này.',
            'field_work.required'       =>'Không để trống trường này.',
            'description.required'      =>'Không để trống trường này.',
            'start_time.before'         =>'Không được chọn ngày trước ngày hiện tại.',
            'end_time.before'           =>'Không được chọn ngày trước ngày hiện tại.',
            'end_time.date_format'      =>'Không đúng định dạng.',
            'start_time.date_format'    =>'Không đúng định dạng.',
        ];
    }
    public function withValidator($validator)
    {
//        $validator->after(function ($validator) {
//            $errors = $validator->errors()->messages();
//
//            if (empty($errors['start_time']) && empty($errors['end_time'])) {
//                if (strtotime(request()->start_time) > strtotime(request()->end_time)) {
//                    $errors['start_time']=['Ngày bắt đầu lớn hơn ngày kết thúc'];
//                    }
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
