<?php

namespace App\Http\Requests;

use App\Service\AccountSkill\AccountSkillService;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Input;

class UpdateAccountSkillRequest extends FormRequest
{
    private $accountSkillService;

    public function __construct( AccountSkillService $accountSkillService)
    {
        $this->accountSkillService = $accountSkillService;

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
            'point' => 'required|numeric|min:0|max:100',
            'skill_id' => 'required'
        ];
    }
    public function withValidator($validator)
    {

        $validator->after(function ($validator) {
            if ($this->checkSkillAccount()) {
                $validator->errors()->add('skill_id', 'Kĩ năng này đã được tồn tại ');
            }
        });
    }

    public function checkSkillAccount()
    {
        $id = request()->route('id');
        return $this->accountSkillService->checkSkillAccount($this->request->all(), $id);
    }
}
