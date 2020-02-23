<?php

namespace App\Http\Controllers\Candidate;

use App\Http\Controllers\Controller;
use App\Service\Candidate\CandidateService;
use App\Service\Jobs\JobService;
use App\Service\Mail\MailService;
use Illuminate\Support\Facades\DB;

class CandidateController extends Controller
{

    private $candidateService;
    private $jobService;
    private $mailService;

    public function __construct(
        CandidateService $candidateService,
        JobService $jobService,
        MailService $mailService
    )
    {
        $this->candidateService = $candidateService;
        $this->jobService = $jobService;
        $this->mailService =$mailService;
    }

    /**
     * @param $jobId
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     * @throws \Exception
     */
    public function applyJob($jobId)
    {
        if(! request()->user){
            throw new \Exception('user id not exist');
        }
        $userId = request()->user->id;
        $referralId = request()->input('uid');
        $checkApply = $this->candidateService->checkApplyJob($jobId,$userId);
        if(!empty($checkApply)){
            return redirect('/cong-viec/'.$jobId)->with('wasApplySuccess', 'Đã ứng tuyển công việc này!');
        }
        $job = $this->jobService->getJobDetailByJobId($jobId);
        if(empty($job)) {
            return redirect('/cong-viec/'.$jobId)->with('applyError', 'Ứng tuyển công việc thất bại!');
        }
        $is_apply = $this->candidateService->applyJob($job, $userId, $referralId);
        if(!$is_apply) {
            return redirect('/cong-viec/'.$jobId)->with('applyError', 'Ứng tuyển công việc thất bại!');
        }
        $this->mailService->sendMailApplyJob($job);
        $this->mailService->sendMailApplyJobToAccount($job);
        return redirect('/cong-viec/'.$jobId)->with('applySuccess', 'Ứng tuyển thành công!');
    }

    public function applyJobApi($jobId)
    {
        if(! request()->user){
            throw new \Exception('user id not exist');
        }
        $userId = request()->user->id;
        $referralId = request()->input('uid');
        $checkApply = $this->candidateService->checkApplyJob($jobId,$userId);
        if(!empty($checkApply)){
            session()->flash('applySuccess', 'Đã ứng tuyển công việc này !');
            return response()->json('/cong-viec/'.$jobId);
        }
        $job = $this->jobService->getJobDetailByJobId($jobId);
        if(empty($job)) {
            session()->flash('applySuccess', 'Ứng tuyển công việc thất bại!');
            return response()->json('/cong-viec/'.$jobId);
        }
        $is_apply = $this->candidateService->applyJob($job, $userId, $referralId);

        if(!$is_apply) {
            session()->flash('applySuccess', 'Ứng tuyển công việc thất bại!');
            return response()->json('/cong-viec/'.$jobId);
        }
        $this->mailService->sendMailApplyJob($job);
        $this->mailService->sendMailApplyJobToAccount($job);
        session()->flash('applySuccess', 'Ứng tuyển thành công!');
        return response()->json('/cong-viec/'.$jobId);
    }

}
