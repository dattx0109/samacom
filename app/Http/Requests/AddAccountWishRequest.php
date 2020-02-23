<?php


namespace App\Http\Requests;


use Illuminate\Foundation\Http\FormRequest;

class AddAccountWishRequest extends FormRequest
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

//            'filed_work_wish' => 'required',
//            'skill_id' => 'required'
        ];
    }
    public function messages()
    {
        return [
            'filed_work_wish.required'=>'Bạn phải lựa trọng trường này.',
//            'skill_id.required'=>'Không để trống trường này.',
//            'point.numeric'=>'Không đúng định dạng.',
//            'point.min'=>'ít nhất là  0',
//            'point.max'=>'Nhiều nhất là 100.',
        ];
    }

}
