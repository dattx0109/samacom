<?php
namespace App\Http\Controllers\VirtualAssistant;

use App\Http\Controllers\Controller;
use App\Service\CharacterJobService\CharacterJobService;
use App\Service\FieldJobService\FiledJobService;
use App\Service\FilterService\FilterJobService;
use App\Service\Province\GetListService;
use App\Service\Skill\SkillService;

class VirtualAssistantController extends Controller
{

    private $getListProvinceService;
    private $skillService;
    private $filedJobService;
    private $characterJobService;
    private $filterJobService;

    public function __construct(
        GetListService $getListService,
        SkillService $skillService,
        FiledJobService $filedJobService,
        CharacterJobService $characterJobService,
        FilterJobService $filterJobService
    )
    {
        $this->getListProvinceService = $getListService;
        $this->skillService           = $skillService;
        $this->filedJobService        = $filedJobService;
        $this->characterJobService    = $characterJobService;
        $this->filterJobService        = $filterJobService;
    }

    public function homeNew()
    {
        return view('virtualAssistant.virtualAss');
    }

    public function home()
    {
        $user = session('user');

        $listProvince = $this->getListProvinceService->getAllProvinceAndDistricts();
        $allSkill = $this->skillService->getAllSkill();
        $envCompany = [
            1 => 'Thu nhập',
            2 => 'Kiến thức',
            3 => 'Môi trường',
            4 => 'Cơ hội thăng tiến'
        ];
        $listSaleType = [
            1 => 'Sale Admin',
            2 => 'Telesale',
            3 => 'Sale tư vấn',
            4 => 'Sale thị trường',
            5 => 'Sale bán hàng',
            6 => 'Sale online',
        ];


        $listBenefit = [
            1 => 'Hỗ trợ xăng xe',
            2 => 'Bảo hiểm y tế',
            3 => 'Trợ cấp thai sản',
            4 => 'Bảo hiểm xã hội',
            5 => 'Hỗ trợ phí điện thoại',
            6 => 'Cung cấp máy tính riêng',
        ];
        $listCharacter = $this->characterJobService->getAllCharacter();
        $listField     = $this->filedJobService->getAllField();

        return view('virtualAssistant.virtualAssistant', [
            'user'         => $user,
            'listProvince' => $listProvince,
            'listSkill'    => $allSkill,
            'listSaleType' => $listSaleType,
            'listField'    => $listField,
            'listCharacter' => $listCharacter,
            'envCompany'    => $envCompany,
            'listBenefit'  => $listBenefit
        ]);
    }


    public function filterJob()
    {
//        $rawData = [
//            'name' => 'Tienvm',
//            'phone' => '0868888336',
//            'email' => 'admin@samacom.com.vn',
//            'district_id' => 1,
//            'province_id' => 2,
//            'tag_id' => [1, 2],
//            'env-company' => 1,
//            'experience' => 1,
//            'skill_id' => [1, 2, 3, 5],
//            'character_id' => [1, 2, 3, 4],
//            'base_salary_min' => 3000000,
//            'base_salary_max' => 1000000,
//            'income_min' => 3000000,
//            'income_max' => 1000000,
//            'benifit' => [1, 2],
//            'need-type' => 1
//        ];

        $rawData = request()->input('data');
        $listJobId = $this->filterJobService->run($rawData);
        return response()->json($listJobId);
    }
}