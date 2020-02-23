<?php

namespace App\Http\Controllers\SmsConfirm;

use App\Http\Controllers\Controller;
use App\Mail\Mailer;
use App\Service\Account\AccountService;
use App\Service\AccountVerify\AccountVerifyService;
use App\Service\Login\LoginService;
use App\Service\Mail\MailService;
use Illuminate\Http\Request;

class SmsConfirmController extends Controller
{
    private $accountService;
    private $accountVerifyService;
    private $loginService;
    private $mailService;
    public function __construct(AccountService $accountService, AccountVerifyService $accountVerifyService, LoginService $loginService, MailService $mailService)
    {
        $this->accountService = $accountService;
        $this->accountVerifyService = $accountVerifyService;
        $this->loginService = $loginService;
        $this->mailService = $mailService;
    }

    public function smsConfirm(Request $request)
    {
         $account = $this->accountService->getAccountByPhone(request()->user->phone);
         if( empty($account) ||$account->is_active ==1 )
         {
            return view('error.403');
         }

         $verifyAccount = $this->accountVerifyService->info($account->id);
         $countCodeActive = $this->accountVerifyService->countCodeActive();

         return view('smsConfirm.sms-confirm',['verifyAccount'=>$verifyAccount,'countCodeActive'=>$countCodeActive]);
    }

    public function confirmSms(Request $request)
    {
        $rawData = $request->all();
        $isActive = $this->accountVerifyService->confirmSms($rawData);

        if ($isActive == false) {
            $this->accountVerifyService->activeFail();
            return redirect('/confirm/sms')->with('activeError', 'Mã không đúng');
        }
        $user = $this->loginService->getUserByPhone(request()->user->phone);
        $this->storeUserToSessionSerVer($user);

        $request->request->add(['user' => $user]);
        if (request()->session()->has('redirect')) {
            $url = session('redirect');
            return redirect($url.'?uid='.session('uid').'&checkFalse=1');
        }
        $this->mailService->sendMailConfirmActiveAccount(request()->user);
        return redirect('/');
    }
    public function storeUserToSessionSerVer($user)
    {
        session()->put('user', $user);
    }
}
