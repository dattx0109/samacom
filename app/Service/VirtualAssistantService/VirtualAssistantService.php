<?php
namespace App\Service\VirtualAssistantService;

use App\Repository\Account\AccountRepository;
use App\Repository\PhoneVerifyRepository\PhoneVerifyRepository;
use Illuminate\Support\Facades\Hash;

class VirtualAssistantService
{
    const MAX_SMS_TODAY = '3';
    private $accountRepository;
    private $phoneVerifyRepository;

    public function __construct(AccountRepository $accountRepository, PhoneVerifyRepository $phoneVerifyRepository)
    {
        $this->accountRepository = $accountRepository;
        $this->phoneVerifyRepository = $phoneVerifyRepository;
    }

    public function checkAccount($rawData)
    {
        return $this->accountRepository->getAccountByPhone($rawData['phone']);
    }

    public function verifyCode($rawData)
    {
        $codeVerify = $this->phoneVerifyRepository->getCodeVerify($rawData['code'], $rawData['phone']);
        if( ! $codeVerify){
            return false;
        }

        if( $codeVerify->status == 1){
            return false;
        }

        if($codeVerify->expired_at < date('Y-m-d h:i:s')){
            return false;
        }

        $this->phoneVerifyRepository->updateStatusVerify($codeVerify->id);

        $rawDataInsertAccount = [
            'name'       => isset($rawData['name']) ? $rawData['name'] : '',
            'email'      => isset($rawData['email']) ? $rawData['email'] : '',
            'password'   => Hash::make($rawData['password']),
            'phone'      => $rawData['phone'],
            'is_active'  => 1,
            'created_at' => date("Y-m-d h:i:s"),
            'updated_at' => date("Y-m-d h:i:s")
        ];

        $this->accountRepository->insertAccount($rawDataInsertAccount);

        return true;
    }

    public function generateSmsAccount($phone)
    {
        $totalSmsToDay = $this->phoneVerifyRepository->countSmsInDayByPhone($phone);
        if($totalSmsToDay >= 3){
            return self::MAX_SMS_TODAY;
        }
        $dateExpired = date('Y-m-d h:i:s', (time() + 5*60));
        $rawDataInsert = [
            'phone' => $phone,
            'created_at' => date("Y-m-d h:i:s"),
            'updated_at' => date("Y-m-d h:i:s"),
            'expired_at' => $dateExpired,
            'code'       => $this->buildCodeSms()
        ];

        return $this->phoneVerifyRepository->insertPhoneVerify($rawDataInsert);

    }

    public function buildCodeSms()
    {
        return 123456;
        return rand ( 100000 , 999999);
    }

    public function verifyAccount($rawData)
    {
        if($rawData['isNewAccount']){

        }
    }

}