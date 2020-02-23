<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Exceptions\HttpResponseException;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\Input;

class UpdateAccountRequest extends FormRequest
{
    public function __construct()
    {
        $dateNew = str_replace('/', '-', request()->input('date_of_birth'));
        Input::merge(['date_of_birth' => $dateNew]);

    }
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
            'name'              => 'required|max:256',
            'email'             =>['regex:/^(([^<>()\[\]\\\\.,;:\s@"]+(\.[^<>()\[\]\\\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/'],
            'date_of_birth'     =>'required|date_format:"d-m-Y"|before:today',
//            'gender'            =>'required',
//            'marital_status'    =>'required',
            'full_address'      =>'required',
            'province_id'       =>'required',
//            'district_id'       =>'required',
//            'job_search_status' =>'required',
            'height'            =>'nullable|numeric|min:100|max:250',
//            'career_goals'      =>'required',

        ];
    }

    public function messages()
    {
        return [
            'name.required'                 => 'Trường này không được để trống.',
            'name.max'                      => 'Không được nhập quá 256 ký tự.',
//            'email.required'                => 'Trường này không được để trống.',
            'email.regex'                   => 'Không nhập đúng định dạng.',
            'date_of_birth.required'        => 'Trường này không được để trống.',
            'date_of_birth.date_format'        => 'Không đúng định dạng.',
            'date_of_birth.before'        => 'Không được chọn ngày trước ngày hiện tại.',
//            'gender.required'               => 'Trường này không được để trống.',
//            'marital_status.required'       => 'Trường này không được để trống.',
            'full_address.required'         => 'Trường này không được để trống.',
            'province_id.required'          => 'Trường này không được để trống.',
//            'district_id.required'          => 'Trường này không được để trống.',
//            'job_search_status.required'    => 'Trường này không được để trống.',
            'height.numeric'                => 'Không đúng định dạng số.',
            'height.min'                => 'Không nhỏ hơn 100cm.',
            'height.max'                => 'Không lơn hơn 250cm.',
//            'career_goals.required'         => 'Trường này không được để trống.',
        ];
    }
}
