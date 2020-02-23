<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\RegisterRequest;
use App\Service\AccountVerify\AccountVerifyService;
use App\Service\Mail\MailService;
use App\Service\Register\RegisterService;
use Illuminate\Support\Facades\DB;


class RegisterController extends Controller
{
    private $registerService;
    private $accountVerifyService;
    private $mailService;

    public function __construct(RegisterService $registerService,AccountVerifyService $accountVerifyService, MailService $mailService)
    {
        $this->registerService = $registerService;
        $this->accountVerifyService = $accountVerifyService;
        $this->mailService = $mailService;
    }

    public function getRegister()
    {
        return view('auth.register');
    }

    public function postRegister(RegisterRequest $request)
    {
        $rawData = $request->all();
        $dataUser = $this->registerService->register($rawData);
        $this->mailService->sendMailCodeActive($dataUser);
        $this->registerService->storeSession($dataUser);

        return redirect('/confirm/sms');
    }

    public function newAccountVerify()
    {
        $countCodeActive = $this->accountVerifyService->countCodeActive();
        if ($countCodeActive == 3) {
            return response()->json(['count' => 'Đã quá 3 lần tạo mã mới trong một ngày. '], 422);
        }
        $newCode = $this->accountVerifyService->newCodeAccountActive();
        if (!$newCode) {
            return response()->json(['count' => 'Có lỗi xảy ra vui lòng thử lại sau. '], 422);
        }
        $this->mailService->sendMailCodeActive(request()->user);
        return response('success', 200);
    }
}
