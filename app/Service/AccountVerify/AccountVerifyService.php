<?php

namespace App\Service\AccountVerify;


use App\Mail\Mailer;
use App\Repository\Account\AccountRepository;
use App\Repository\AccountVerify\AccountVerifyRepository;
use Illuminate\Support\Facades\DB;

class AccountVerifyService
{
    private $accountVerifyRepository;
    private $accountRepository;

    public function __construct(
        AccountVerifyRepository $accountVerifyRepository,
        AccountRepository $accountRepository
    )
    {
        $this->accountVerifyRepository = $accountVerifyRepository;
        $this->accountRepository = $accountRepository;
    }

    public function insert($dataRaw)
    {
        $this->accountVerifyRepository->insert($dataRaw);
    }
    public function info($accountId)
    {
       return $this->accountVerifyRepository->info($accountId);
    }

    public function newCodeAccountActive()
    {
        DB::beginTransaction();
        try {
            $code = getRandomCode();
            $rawData = [
                'account_id' => request()->user->id,
                'expried_at' => date("Y-m-d H:i:s", strtotime(date("Y/m/d H:i:s") . " +60 minutes")),
                'count_verify' => 0,
                'code' => $code,
                'type' => AccountVerifyRepository::TYPE_ACTIVE,
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s')
            ];
            $this->accountVerifyRepository->insert($rawData);
            DB::commit();
            return true;
        } catch (\Exception $e) {
            DB::rollBack();
            return false;

        }
    }

    public function confirmSms($rawData)
    {
        $accountId = $rawData['user']->id;
        $codeInput = $rawData['code'];
        $code = ($this->accountVerifyRepository->getCode($accountId))->code;
        if($codeInput == $code){
            $this->accountRepository->UpdateActiveAccount($accountId);
            return true;
        }
        return false;
    }

    public function countCodeActive()
    {
        return $this->accountVerifyRepository->countCodeActiveOfDay();
    }

    public function activeFail(){
        $this->accountVerifyRepository->activeFail();
    }
}
