<?php

namespace App\Service\Account;

use App\Repository\Account\AccountRepository;
use App\Repository\AccountDetail\AccountDetailRepository;
use App\Service\File\FileServiceConst;
use App\Service\FileManagerServiceBase64\FileManagerService;
use Illuminate\Support\Collection;

class AccountService
{
    private $accountRepository;
    private $accountDetailRepository;
    private  $fileManagerService;

    /**
     * AccountService constructor.
     * @param AccountRepository $accountRepository
     * @param AccountDetailRepository $accountDetailRepository
     * @param FileManagerService $fileManagerService
     */
    public function __construct(AccountRepository $accountRepository, AccountDetailRepository $accountDetailRepository, FileManagerService $fileManagerService)
    {
        $this->accountRepository = $accountRepository;
        $this->accountDetailRepository = $accountDetailRepository;
        $this->fileManagerService = $fileManagerService;
    }

    /**
     * @param $dataCheck
     * @return Collection
     */
    public function checkAccount($dataCheck)
    {
        return $this->accountRepository->checkAccountByPhoneOrEmail($dataCheck);

    }
    public function getAccountByPhone($phone)
    {
        return $this->accountRepository->getAccountByPhone($phone);

    }

    public function changePassword($passwordNew,$accountId)
    {
        return $this->accountRepository->changePassword($passwordNew, $accountId);
    }
    public function updateDetail($rawData)
    {
        if(isset($rawData['name']) || isset($rawData['email'])){
            $this->updateRawDataToAccount($rawData, $rawData['id']);
        }
        $this->updateRawDataAccountDetail($rawData);
    }

    public function updateAccountDetailGoal($rawData)
    {
        return $this->updateRawDataAccountDetail($rawData);
    }

    public function updateRawDataToAccount($rawData, $accountId)
    {
        $rawUpdate = [
            'name' => $rawData['name'],
            'email' => $rawData['email'],
            'updated_at' => date("Y/m/d H:i:s")
        ];
        return $this->accountRepository->updateName($rawUpdate, $accountId);
    }

    public function updateRawDataAccountDetail($rawData)
    {
        $isAccountDetailExist = $this->accountDetailRepository->findAccountDetailById($rawData['id']);
        $rawDataUpdate        = $rawData;
        $rawDataUpdate['account_id'] = $rawDataUpdate['id'];
        unset($rawDataUpdate['id']);
        unset($rawDataUpdate['email']);
        unset($rawDataUpdate['name']);

        if($isAccountDetailExist){
            return $this->accountDetailRepository->updateAccountDetailByIdAndRawData($rawData['id'], $rawDataUpdate);
        }

        return $this->accountDetailRepository->createAccountDetail($rawDataUpdate);

    }

    public function getAccount()
    {
        return $this->accountRepository->getAccount();
    }

    public function uploadAvatar($image)
    {
        $pathFileService = $this->fileManagerService
            ->setFile($image)
            ->setService(FileManagerService::SERVICE_SAMACOM)
            ->setUserId(3)
            ->handle()
        ;
        $dataUpload = [
            'avatar' => $pathFileService,
            'account_id' => request()->user->id
        ];
        $this->accountDetailRepository->uploadAvatar($dataUpload);
        return env('RICH_FILE_URL_BASE').$pathFileService;
    }

    public function uploadStatus($status)
    {
//        $path = $this->storeFileToS3();
//        if ($path) {
        $dataUpload = [
            'job_search_status' => $status,
            'account_id' => request()->user->id
        ];
        $this->accountDetailRepository->uploadAvatar($dataUpload);
//        }
        return $status;
    }

    public function storeFileToS3()
    {
        if (!request()->file('avatar')) {
            return null;
        }

        $path = request()->file('avatar')->store(
            FileServiceConst::FILE_TYPE_LOGO, 's3'

        );


        return $path;
    }

    public function percentageProfile()
    {
        $percentageProfile = new \stdClass();
        if (request()->session()->has('user')) {
            $account = $this->accountRepository->percentageProfile();
            $checkPassRequired = $this->checkPassRequired($account);
            $calculationPercentageProfile = $this->calculationPercentageProfile($account);

            $percentageProfile->is_pass_apply = $checkPassRequired;
            $percentageProfile->percentage_profile = $calculationPercentageProfile;

            return $percentageProfile;
        }
        $percentageProfile->is_pass_apply = false;
        $percentageProfile->percentage_profile = 0;
        return $percentageProfile;
    }

    public function checkPassRequired($account)
    {

        $attributeAccountRequired = [
            'name',
            'avatar',
            'date_of_birth',
            'province_id',
            'full_address',
            'career_goals',
            'account_exp',
            'account_edu'
        ];
        foreach ($attributeAccountRequired as $attributeAccount) {
            if (empty($account->$attributeAccount)) {
                return false;
            }
        }
        return true;
    }

    public function calculationPercentageProfile($account)
    {
        $attributeAccounts = [
            'account_skill',
            'account_edu',
            'account_exp',
            'character',
//            'height',
            'strengths_weaknesses',
            'extracurricular_activities',
            'marital_status',
            'career_goals',
            'link_fb',
            'full_address',
            'district_id',
            'province_id',
            'date_of_birth',
            'gender',
            'avatar',
            'name',
            'email',
        ];
        $i = 0;
        foreach ($attributeAccounts as $attributeAccount) {
            if (!empty($account->$attributeAccount)) {
                $i = $i + 1;
            }
        }
        $percentageProfile = $i / count($attributeAccounts);

        return round($percentageProfile * 100, 2);
    }
}
