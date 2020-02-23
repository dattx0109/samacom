<?php

namespace App\Http\Controllers\Account;

use App\Http\Controllers\Controller;
use App\Http\Requests\AddAccountEducationRequest;
use App\Http\Requests\AddAccountExperienceRequest;
use App\Http\Requests\AddAccountSkillRequest;
use App\Http\Requests\ChangePasswordRequest;
use App\Http\Requests\CheckAccountRequest;
use App\Http\Requests\UpdateAccountRequest;
use App\Http\Requests\UpdateAccountSkillRequest;
use App\Service\Account\AccountService;
use App\Service\AccountCharacter\AccountCharacterService;
use App\Service\AccountDetail\AccountDetailService;
use App\Service\AccountEducation\AccountEducationService;
use App\Service\AccountExperience\AccountExperienceService;
use App\Service\AccountSkill\AccountSkillService;
use App\Service\AccountVerify\AccountVerifyService;
use App\Service\Candidate\CandidateService;
use App\Service\Character\CharacterService;
use App\Service\FieldJobService\FiledJobService;
use App\Service\Login\LoginService;
use App\Service\Province\ProvinceService;
use App\Http\Requests\AddAccountWishRequest;
use App\Service\District\DistrictService;
use App\Service\Skill\SkillService;
use App\Service\VirtualAssistantService\VirtualAssistantService;
use Illuminate\Contracts\Routing\ResponseFactory;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use App\Service\AccountWish\AccountWishService;
use Illuminate\Http\Response;

class AccountController extends Controller
{
    private $accountService;
    private $accountVerifyService;
    private $provinceService;
    private $accountExperienceService;
    private $accountSkillService;
    private $accountEducationService;
    private $accountDetailService;
    private $districtService;
    private $filedJobService;
    private $skillService;
    private $accountWishService;
//    private $accSkillService;
    private $virtualRegisterAccount;
    private $loginService;
    private $characterService;
    private $accountCharacterService;

    public function __construct(
//        AccountSkillService $accSkillService,
        AccountService $skillAccService,
        SkillService $skillService,
        AccountService $accountService,
        AccountVerifyService $accountVerifyService,
        AccountExperienceService $accountExperienceService,
        AccountSkillService $accountSkillService ,
        AccountEducationService $accountEducationService,
        ProvinceService $provinceService,
        AccountDetailService $accountDetailService,
        DistrictService $districtService,
        FiledJobService $filedJobService,
        AccountWishService $accountWishService,
        VirtualAssistantService $virtualAssistantService,
        LoginService $loginService,
        CharacterService $characterService,
        AccountCharacterService $accountCharacterService
    ) {
//        $this->accSkillService = $accSkillService;
        $this->accountService               = $skillAccService ;
        $this->skillService                 = $skillService;
        $this->accountService               = $accountService;
        $this->provinceService              = $provinceService;
        $this->accountVerifyService         = $accountVerifyService;
        $this->accountExperienceService     = $accountExperienceService;
        $this->accountSkillService          = $accountSkillService;
        $this->accountEducationService      = $accountEducationService;
        $this->accountDetailService         = $accountDetailService;
        $this->districtService              = $districtService;
        $this->filedJobService              = $filedJobService;
        $this->accountWishService           = $accountWishService;
        $this->virtualRegisterAccount       = $virtualAssistantService;
        $this->loginService                 = $loginService;
        $this->characterService             = $characterService;
        $this->accountCharacterService      = $accountCharacterService;
    }

    public function checkAccount(CheckAccountRequest $request)
    {
        $checkAccount = $this->accountService->checkAccount($request->all());
        if (!empty($checkAccount)) {
            return response()->json('Số điện thoại đã tồn tại trong hệ thống', 422);
        }
        return response()->json('Thông tin số điện thoại chưa có trong hệ thống', 200);
    }

    public function verifyCode()
    {
        $rawData = request()->input();
        $isVerify = $this->virtualRegisterAccount->verifyCode($rawData);
        if( ! $isVerify){
            return response()->json([
                'isVerify' => 0
            ]);
        }

        return response()->json([
            'isVerify' => 1
        ]);
    }

    public function virtualRegisterAccount()
    {
        $userIsLogin = session('user');
        if($userIsLogin){
            $rawDataResponse = [
                'isLogin'     => 1,
                'isCountVerify' => 1,
                'phone'         => null
            ];
            return response()->json($rawDataResponse);
        }

        $rawDataResponse = [
            'isAccount' => 0,
            'isLogin'     => 0,
            'isCountVerify' => 1,
            'phone'     => request()->input('phone')
        ];

        $accountExist = $this->virtualRegisterAccount->checkAccount(request()->input());

        if($accountExist){
            $rawDataResponse = [
                'isLogin'     => 0,
                'isAccount'     => 1,
                'isCountVerify' => 1,
                'phone'         => $accountExist->phone
            ];
            return response()->json($rawDataResponse);
        }

        $sendSmsAccount = $this->virtualRegisterAccount->generateSmsAccount(request()->input('phone'));
        if($sendSmsAccount === VirtualAssistantService::MAX_SMS_TODAY){
            return response()->json([
                'isAccount'     => 0,
                'isCountVerify' => 0,
                'phone' => 0
            ]);
        }
        return response()->json($rawDataResponse);
    }

    public function loginAccount()
    {
        $rawData = request()->input();
        $account = $this->loginService->getUserByPhone($rawData['phone']);
        $isLoginSuccess = \Hash::check($rawData['password'], $account->password);
        session()->put('user', $account);
        if($isLoginSuccess){
            return response()->json(['status' => 1]);
        }

        return response()->json(['status' => 0]);
    }

    public function changePassword()
    {
        return view('change-password.change-password');
    }
    public function changePasswordAfterAddPasswordNew(ChangePasswordRequest $request)
    {
        $passwordNew = $request->password_new;
        $accountId = request()->user->id;
        $this->accountService->changePassword($passwordNew,$accountId );
        return redirect('/');
    }

    public function detail()
    {
        return view('profile-vue.profile');
    }

    public function getListProvince()
    {
        $province = $this->provinceService->getList();
        return response()->json($province);
    }

    public function detailApi()
    {
        $accountDetail = $this->accountDetailService->detail();
        if(isset($accountDetail->avatar) && $accountDetail->avatar){
            $accountDetail->avatar = env('RICH_FILE_URL_BASE').$accountDetail->avatar;
        }
//        $account = $this->accountService->getAccountByPhone(request()->user->phone);
//        $province = $this->provinceService->getList();

        $districts = [];

        if(!empty($accountDetail)){
            $districts = $this->districtService->getListDistrictsByProvinceId($accountDetail->province_id);
        }else{
            $accountDetail = [
                'account_id' => request()->user->id,
                'avatar' => null,
                'gender' => null,
                'date_of_birth' => null,
                'province_id' => null,
                'district_id' => null,
                'full_address' => null,
                'link_fb' => null,
                'career_goals' => null,
                'marital_status' => null,
                'extracurricular_activities' => null,
                'strengths_weaknesses' => null,
                'height' => null,
                'character' => null,
                'job_search_status' => null,
            ];
        }

//        $fieldJob = $this->filedJobService->getAllField();
//        $skill = $this->skillService->getAllSkill();
//        $accSkill = $this->accountSkillService->getSkill();
//        $characters = $this->characterService->getAllCharacter();
//        $accCharacter = $this->accountCharacterService->getCharacterByAccountCharacterId();
//        $accountExp = $this->accountExperienceService->getDataAccountExpByAccountId();
//        $accountEdu = $this->accountEducationService->getData();
//        $accountWish = $this->accountWishService->getData();
//        $percentageProfile =$this->accountService->percentageProfile();

//        if(!empty($accountWish)){
//            $districtsAccountWish = $this->districtService->getListDistrictsByProvinceId($accountWish->province_id);
//        }else{
//            $accountWish = [
//                'filed_work_wish' => null,
//                'account_id' => request()->user->id,
//                'position_wish' => null,
//                'salary_wish' => null,
//                'province_id' => null,
//                'district_id' => null,
//                'current_priority' => null,
//                'job_type_wish' => null,
//            ];
//            $districtsAccountWish = [];
//        }

        return response()->json(
            [
//                'accSkill' => $accSkill,
//                'skill' => $skill,
//                'provinces' => $province,
                'accountDetail' => $accountDetail,
//                'account'=> $account,
                'districts'=> $districts,
//                'fieldJobs'=> $fieldJob,
//                'accountExp' => $accountExp,
//                'accountEdu' => $accountEdu,
//                'accountWish' => $accountWish,
//                'districtsAccountWish' => $districtsAccountWish,
//                'percentageProfile' => $percentageProfile,
//                'characters' => $characters,
//                'accCharacter' => $accCharacter,
            ]
        );
    }

    public function getAllFieldJobs()
    {
        $fieldJob = $this->filedJobService->getAllField();
        return response()->json($fieldJob);
    }

    public function getAccount()
    {
        $account = $this->accountService->getAccountByPhone(request()->user->phone);
        return response()->json($account);
    }

    public function getCharacterProfile()
    {
        $accCharacter = $this->accountCharacterService->getCharacterByAccountCharacterId();
        return response()->json($accCharacter);
    }

    public function getListAccountExp()
    {
        $accountExp = $this->accountExperienceService->getDataAccountExpByAccountId();
        return response()->json($accountExp);
    }

    public function getListAccountEdu()
    {
        $accountEdu = $this->accountEducationService->getData();
        return response()->json($accountEdu);
    }

    public function getListAccountWish()
    {
        $accountWish = $this->accountWishService->getData();
        if(!$accountWish){
            $accountWish = [
                'filed_work_wish' => null,
                'account_id' => request()->user->id,
                'position_wish' => null,
                'salary_wish' => null,
                'province_id' => null,
                'district_id' => null,
                'current_priority' => null,
                'job_type_wish' => null,
            ];
        };
        if(isset($accountWish->province_id)){
            $districtsAccountWish = $this->districtService->getListDistrictsByProvinceId($accountWish->province_id);
        }else{
            $districtsAccountWish = [];
        }
        return response()->json([
            'accountWish' => $accountWish,
            'districtsAccountWish' => $districtsAccountWish
        ]);
    }

    public function percentageProfile()
    {
        $percentageProfile =$this->accountService->percentageProfile();
        return response()->json($percentageProfile);
    }

    public function getAllSkill()
    {
        $skill = $this->skillService->getAllSkill();
        return response()->json($skill);
    }

    public function getSkillCharacter()
    {
        $accSkill = $this->accountSkillService->getSkill();
        return response()->json($accSkill);
    }

    public function getAllCharacter()
    {
        $characters = $this->characterService->getAllCharacter();
        return response()->json($characters);
    }

    public function createEmployee()
    {
        $data = Request()->all();
        return view('account.update-info-account');
    }

    // kinh nghiem cua ung vien
    public function createExperience(AddAccountExperienceRequest $request)
    {
        $accountExpId =  $this->accountExperienceService->create($request->all());
        $data = $this->accountExperienceService->getDataAccountExpByIdAccountExp($accountExpId);
        $data->position = getParseRank($data->position);
//        dd($data);
        $percentageProfile =$this->accountService->percentageProfile()->percentage_profile;
        return response()->json([$data ,$percentageProfile],200);
    }

    public function deleteAccountExperience($id)
    {
        $this->accountExperienceService->delete($id);
        $percentageProfile =$this->accountService->percentageProfile()->percentage_profile;
        return response()->json($percentageProfile,200);
    }

    public function getAccountExperienceById($id)
    {
        $data = $this->accountExperienceService->getDataAccountExpByIdAccountExpForUpdateExp($id);
        return response()->json($data,200);
    }

    public function updateAccountExperience()
    {
        $this->accountExperienceService->update(request()->all());
        $data = $this->accountExperienceService->getDataAccountExpByIdAccountExp((int)request()->id);
        $data->position = getParseRank($data->position);
        return response()->json($data,200);
    }

    /**
     * @param AddAccountSkillRequest $request
     * @return JsonResponse
     */
    public function storeAccountSkill(AddAccountSkillRequest $request)
    {
        $accountSkillId = $this->accountSkillService->insert($request->all());
        $data =$this->accountSkillService->getSkillByAccountSkillId($accountSkillId);
        return response()->json($data, 200);
    }

    /**
     * @param $id
     * @return ResponseFactory|Response
     */
    public function deleteAccountSkill($id)
    {
        $this->accountSkillService->delete($id);
        return response('success',200);
    }

    /**
     * @param $id
     * @return JsonResponse
     */
    public function getAccountSkillById($id)
    {
        $accountSkill = $this->accountSkillService->getDetailAccountSkillById($id);
        return response()->json(['accountSkill' => $accountSkill], 200);
    }

    /**
     * @param $id
     * @param UpdateAccountRequest $request
     * @return ResponseFactory|Response
     */
    public function updateAccountSkill($id, UpdateAccountSkillRequest $request)
    {
        $this->accountSkillService->updateAccountSkill($id,$request->all());
        return response('success',200);
    }
    public function createAccountEducation(AddAccountEducationRequest $request)
    {
        $accountEducationId = $this->accountEducationService->insert($request->all());
        $data = $this->accountEducationService->getAccountEduId($accountEducationId);
        $percentageProfile =$this->accountService->percentageProfile()->percentage_profile;
        return response()->json([$data, $percentageProfile], 200);

    }
    public function deleteAccountEducation($id)
    {
        $this->accountEducationService->delete($id);
        $percentageProfile =$this->accountService->percentageProfile()->percentage_profile;
        return response()->json($percentageProfile, 200);
    }

    public function getAccountEduId($id)
    {
        $getAccountEduId = $this->accountEducationService->getAccountEduId($id);
        return response()->json($getAccountEduId ,200);

    }

    public function updateAccountEducation(Request $request, $id)
    {
        $rawDate = $request->all();
        return $this->accountEducationService->updateAccountEduId($rawDate, $id);
    }

    public function convertFormatDate($dateString)
    {
        $date = str_replace('/', '-', $dateString );
        $newDate = date("Y-m-d", strtotime($date));
        return $newDate;
    }

//    public function updateAccountDetail(UpdateAccountRequest $request)
    public function updateAccountDetail()
    {
        $rawData = request()->input();
        $rawData['id'] = session('user')->id;

        if (isset($rawData['date_of_birth'])){
            $rawData['date_of_birth'] = $this->convertFormatDate($rawData['date_of_birth']);
        }

        unset($rawData['user']);

        $this->accountService->updateDetail($rawData);
        $percentageProfile =$this->accountService->percentageProfile()->percentage_profile;

        return response()->json(
            [
                'percent' => $percentageProfile
            ]
        );

    }

    public function updateAccountDetailGoal()
    {
        $rawData = request()->input();
        $rawData['id'] = session('user')->id;
        $rawData['account_id'] = session('user')->id;
        unset($rawData['user']);

        $this->accountService->updateAccountDetailGoal($rawData);
        $percentageProfile =$this->accountService->percentageProfile()->percentage_profile;

        return response()->json(
            [
                'percent' => $percentageProfile
            ]
        );
    }

    public function base64_to_jpeg($base64_string, $output_file) {
        // open the output file for writing
        $ifp = fopen( $output_file, 'wb' );

        // split the string on commas
        // $data[ 0 ] == "data:image/png;base64"
        // $data[ 1 ] == <actual base64 string>
        $data = explode( ',', $base64_string );

        // we could add validation here with ensuring count( $data ) > 1
        fwrite( $ifp, base64_decode( $data[ 1 ] ) );

        // clean up the file resource
        fclose( $ifp );

        return $output_file;
    }

    public function updateJobStatus()
    {
        $status = request()->input('status');
        $status = $this->accountService->uploadStatus($status);
        return response()->json($status);
    }

    public function uploadAvatar(Request $request){
        $session = session('user');
        $image = $this->base64_to_jpeg( request()->input('image'), '/tmp/profile-'.$session->id.rand(1000, 9999).'.png');

        $image = $this->accountService->uploadAvatar($image);

        // update avatar to profle
        $session->avatar = $image;
        session()->put('user', $session);

        return response()->json($image);
    }

    public function updateAccountWish(AddAccountWishRequest $request)
    {
        $this->accountWishService->insertAndUpdate($request->all());

        return response()->json(['message' => 'success']);

//        if(request()->session()->has('redirect')){
//            return redirect('/account/update-detail'.'?redirect='.url()->full().'&jobId='.session('jobId').'&uid='.session('uid'));
//        }else{
//            return redirect()->route('update-detail');
//        }
    }

    // character account
    public function addCharacterProfile()
    {
        $this->accountCharacterService->insertAccountCharacter();
        return response()->json(['message' => 'success']);
    }

    public function DeleteCharacterAccount($id)
    {
        $this->accountCharacterService->deleteAccountCharacter($id);
        return response()->json(['message' => 'success']);
    }
}
