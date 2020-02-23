<?php

namespace App\Repository\Candidate;

use Illuminate\Support\Facades\DB;

class CandidateRepository
{
    const TABLE_NAME = 'job_applied';

    public function applyJob($rawData)
    {
        return DB::table(self::TABLE_NAME)
            ->insert($rawData);
    }

    public function findCandidateByJobIdAndEmployeeAnd($jobId, $employeeId)
    {
        return DB::table(self::TABLE_NAME)
            ->where('job_id', $jobId)
            ->where('account_id', $employeeId)
            ->first()
        ;
    }

    public function getIdApplyJob($employeeId,$jobId)
    {
        return DB::table(self::TABLE_NAME)
            ->where('job_id', $jobId)
            ->where('account_id', $employeeId)
            ->count();
    }
}
