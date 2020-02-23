<?php

namespace App\Service\Candidate;

use App\Mail\Mailer;
use App\Repository\Candidate\CandidateRepository;
use App\Repository\Jobs\jobsRepository;
use Illuminate\Support\Facades\DB;

class CandidateService
{
    private $candidateRepository;
    private $jobsRepository;

    public function __construct(CandidateRepository $candidateRepository, jobsRepository $jobsRepository)
    {
        $this->candidateRepository = $candidateRepository;
        $this->jobsRepository = $jobsRepository;
    }

    public function applyJob($job, $employeeId, $referralId)
    {
        DB::beginTransaction();
        try {
            $rawDataApplyJob = [
                'account_id' => $employeeId,
                'job_id' => $job->id,
                'referral_user_id' => $referralId,
                'created_at' => date("Y/m/d H:i:s"),
                'updated_at' => date("Y/m/d H:i:s"),
            ];
            $this->candidateRepository->applyJob($rawDataApplyJob);
            DB::commit();
            return true;
        } catch (\Exception $e) {
            DB::rollBack();
            return false;
        }

    }

    public function getIdApplyJob($employeeId,$jobId)
    {
        return $this->candidateRepository->getIdApplyJob($employeeId,$jobId);
    }
    public function checkApplyJob($jobId,$employeeId)
    {
        $check = $this->candidateRepository->findCandidateByJobIdAndEmployeeAnd($jobId, $employeeId);
        return $check;
    }
}
