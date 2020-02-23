<?php

namespace App\Service\Register;
use App\Mail\Mailer;
use App\Repository\AccountDetail\AccountDetailRepository;
use App\Repository\AccountVerify\AccountVerifyRepository;
use App\Repository\User\UserRepository;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use phpDocumentor\Reflection\DocBlock\Description;

class RegisterService
{
    private $userRepository;
    private $accountVerifyRepository;
    private $accountDetailRepository;
    public function __construct(UserRepository $userRepository, AccountVerifyRepository $accountVerifyRepository,AccountDetailRepository $accountDetailRepository)
    {
        $this->userRepository = $userRepository;
        $this->accountVerifyRepository = $accountVerifyRepository;
        $this->accountDetailRepository = $accountDetailRepository;
    }

    public function findEmailAfterRegister($email)
    {
        return $this->userRepository->findEmailAfterRegister($email);
    }

    public function findPhoneAfterRegister($phone)
    {
        return $this->userRepository->findPhoneAfterRegister($phone);
    }

    public function register($rawData)
    {
        DB::beginTransaction();
        try {
            if(request()->session()->has('uid')) {
                $rawDataInsert = [
                    'name' => $rawData['name'],
                    'email' => $rawData['email'],
                    'password' => Hash::make($rawData['password']),
                    'phone' => $rawData['phone'],
                    'referral_user_id' => (int)session('uid'),
                    'created_at' => date('Y-m-d H:i:s'),
                    'updated_at' => date('Y-m-d H:i:s')
                ];

            }else{
                $rawDataInsert = [
                    'name' => $rawData['name'],
                    'email' => $rawData['email'],
                    'password' => Hash::make($rawData['password']),
                    'phone' => $rawData['phone'],
                    'created_at' => date('Y-m-d H:i:s'),
                    'updated_at' => date('Y-m-d H:i:s')
                ];
            }

            $code    = getRandomCode();
            $account = $this->userRepository->insertUser($rawDataInsert);
            $dataAccountDetail =['account_id' => $account->id,'job_search_status'=>1];
            $this->accountDetailRepository->createAccountDetail($dataAccountDetail);
            $rawData = [
                'account_id' => $account->id,
                'expried_at' => date("Y-m-d H:i:s", strtotime(date("Y/m/d H:i:s")." +60 minutes")),
                'count_verify' => 0,
                'code' => $code,
                'type' => AccountVerifyRepository::TYPE_ACTIVE,
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s')
            ];
            $this->accountVerifyRepository->insert($rawData);
            DB::commit();
            return $account;
        } catch (\Exception $e) {
            DB::rollBack();
        }
    }

    public function storeSession($user)
    {
        session()->put('user', $user);
    }

}
