<?php


namespace App\Service\Mail;


use App\Mail\Mailer;
use App\Repository\Account\AccountRepository;
use App\Repository\AccountVerify\AccountVerifyRepository;

class MailService
{
    private $accountVerifyRepository;
    private $accountRepository;

    public function __construct(AccountVerifyRepository $accountVerifyRepository, AccountRepository $accountRepository)
    {
        $this->accountVerifyRepository = $accountVerifyRepository;
        $this->accountRepository = $accountRepository;
    }

    public function sendMailCodeActive($dataUser)
    {
        $codeInfo = $this->accountVerifyRepository->info($dataUser->id);
        $subject = 'SAMACOM - Mã xác nhận đăng ký tài khoản';
        $data = [
            'subject' => $subject,
            'name' => $dataUser->name,
            'email' => $dataUser->email,
            'code' => $codeInfo->code,
        ];
        $template_mail = 'mail.code_active_account';
        return $this->sendMail($template_mail, $data);
    }

    public function sendMailConfirmActiveAccount($user)
    {
        $subject = 'Samacom - Tạo tài khoản ứng viên thành công';
        $data = [
            'subject' => $subject,
            'name' => $user->name,
            'email' => $user->email,
            'link' => 'http://alpha.samacom.com.vn/',
        ];
        $template_mail = 'mail.create_account';

        return $this->sendMail($template_mail, $data);
    }

    public function sendMailApplyJob($job) {
        $subject       = '[Samacom] Thông báo thông tin ứng viên ứng tuyển';
        $user_name     = request()->user->name;
        $job_title     = $job->title_job;
        $email         = $job->employer_email;
        $employer_name = $job->employer_name;
        $name_company = $job->name_company;
        $level_id = $job->getRank;

        $type_job = $job->type;
        if($type_job == 1) { // 1: copy 2: tu dang
            $email = 'quangtran.hrp@gmail.com';
            $employer_name = 'Quang Trần';
        }
        if(!$email) {
            return false;
        }

        $data  = [
            'subject'       => $subject,
            'email'         => $email,
            'user_name'     => $user_name,
            'job_title'     => $job_title,
            'employer_name' => $employer_name,
            'name_company' => $name_company,
            'level_id' => $level_id,
        ];
        $template_mail = 'mail.apply_job';

        return $this->sendMail($template_mail, $data);
    }
    public function sendMailApplyJobToAccount($job) {
        $subject       = 'Samacom - Ứng tuyển job thành công';
        $user_name     = request()->user->name;
        $job_title     = $job->title_job;
        $email         = request()->user->email;
        $employer_name = $job->employer_name;
        $name_company = $job->name_company;
        $level_id = $job->getRank;

        $data  = [
            'subject'       => $subject,
            'email'         => $email,
            'user_name'     => $user_name,
            'job_title'     => $job_title,
            'employer_name' => $employer_name,
            'name_company' => $name_company,
            'level_id' => $level_id,
        ];
        $template_mail = 'mail.apply_job_success_to_account';

        return $this->sendMail($template_mail, $data);
    }

    public function sendMail($template_mail, $data)
    {
        return Mailer::sendMail($template_mail, $data);
    }
}
