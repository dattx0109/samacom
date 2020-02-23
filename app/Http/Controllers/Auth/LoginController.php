<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\LoginRequest;
use App\Service\Account\AccountService;
use App\Service\Login\LoginService;
use Illuminate\Support\MessageBag;
class LoginController extends Controller
{
    private $loginService;
    private $accountService;

    public function __construct(LoginService $loginService,AccountService $accountService)
    {
        $this->loginService = $loginService;
        $this->accountService = $accountService;
    }

    public function getLogin()
    {

        if(!empty(request()->redirect)){
            session(['redirect' => request()->redirect]);
            session(['jobId' => request()->jobId]);
            session(['uid' => request()->uid]);
        }else{
            request()->session()->forget('redirect');
            request()->session()->forget('jobId');
            request()->session()->forget('uid');
        }

        return view('auth.login');
    }

    public function login(LoginRequest $request)
    {
        $rawData      = $request->input();
        $rawDataCheck = array();

        $rawDataCheck['phone']    = $rawData['phone'];
        $rawDataCheck['password'] = $rawData['password'];
        $user = $this->loginService->getUserByPhone($rawDataCheck['phone']);
        if(!$user){
            $errors = new MessageBag(['errors2' => 'Email hoặc số điện thoại chưa được đăng ký']);
            return redirect('/login?redirect='.session('redirect').'&jobId='.session('jobId').'&uid='.session('uid'))->withErrors($errors);
        }

        //$user = $this->loginService->getUserByPhone($rawDataCheck['phone']);
        $isLoginSuccess = \Hash::check($rawDataCheck['password'], $user->password);
        if(!$isLoginSuccess){
            $errors = new MessageBag(['errors1' => 'Mật khẩu không đúng']);
            return redirect('/login?redirect='.session('redirect').'&jobId='.session('jobId').'&uid='.session('uid'))->withErrors($errors);
        }

        $this->storeUserToSessionSerVer($user);
        if($user->is_active === 0){
            return redirect('/confirm/sms');
        }
        $percentageProfile = $this->accountService->percentageProfile();
        if (request()->session()->has('redirect')){
            if($percentageProfile->is_pass_apply ==true){
                return redirect(url('/candidate/'.session('jobId').'?uid='.session('uid')));
            }else{
                return redirect('/cong-viec/'.session('jobId').'?uid='.session('uid').'&checkFalse=1');
            }
           $url =  session('redirect');
            request()->session()->forget('redirect');
            request()->session()->forget('jobId');
            request()->session()->forget('uid');
           return redirect($url);
        }

        return redirect('/');
    }

    public function storeUserToSessionSerVer($user)
    {
        session()->put('user', $user);
    }

    public function logout()
    {
        session()->forget('user');
        return redirect('/');
    }
}
