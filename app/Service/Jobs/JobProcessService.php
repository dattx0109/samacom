<?php

namespace App\Service\Jobs;

use App\Repository\Companies\CompanyRepository;
use App\Repository\Contact\InsertContactRepository;
use App\Repository\Contact\UpdateContactRepository;
use App\Repository\EmployDescription\EmployDescriptionRepository;
use App\Repository\Contact\JobContactRepository;
use App\Repository\JobDescription\JobDescriptionRepository;
use App\Repository\Jobs\JobDetailRepository;
use App\Repository\Jobs\JobRepository;
use App\Service\Contact\InsertContactService;
use App\Service\Contact\UpdateContactService;
use Exception;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class JobProcessService
{
    private $companyRepository;
    private $jobRepository;
    private $jobContactRepository;
    private $jobDetailRepository;
    private $insertJobDescriptionRepository;
    private $employDescriptionRepository;
    private $updateContactRepository;
    private $insertContactRepository;

    const JOB_CRAWLER = 2;

    public function __construct(
        CompanyRepository $companyRepository,
        JobRepository $jobRepository,
        JobContactRepository $jobContactRepository,
        JobDetailRepository $jobDetailRepository,
        JobDescriptionRepository $insertJobDescriptionRepository,
        EmployDescriptionRepository $employDescriptionRepository,
        UpdateContactRepository $updateContactRepository,
        InsertContactRepository $insertContactRepository

    ) {
        $this->companyRepository = $companyRepository;
        $this->jobRepository = $jobRepository;
        $this->jobContactRepository = $jobContactRepository;
        $this->jobDetailRepository = $jobDetailRepository;
        $this->insertJobDescriptionRepository = $insertJobDescriptionRepository;
        $this->employDescriptionRepository = $employDescriptionRepository;
        $this->insertContactRepository = $insertContactRepository;
        $this->updateContactRepository = $updateContactRepository;
    }

    public function convertJob($dataConvert)
    {

        $dataConverts = json_decode($dataConvert, true);
        $dataCompany = $dataJob = $dataJobDescription = array();
        foreach ($dataConverts as $item) {
            array_push($dataCompany, $item['companies']);
        }

        DB::beginTransaction();
        try {
            $dataCompanyInsert = $this->insertCompany($dataCompany);
            $arrJobIds = $this->insertJob($dataConverts, $dataCompanyInsert);

            DB::commit();
            $dataQuere = json_encode($arrJobIds);
            \Amqp::publish('routing-key2', $dataQuere, ['queue' => 'job-update']);
        } catch (Exception $e) {
            DB::rollBack();
            dd($e);
        }
    }

    protected function insertCompany($dataCompanyInserts)
    {
        $arrCompany = [];
        foreach ($dataCompanyInserts as $dataCompany) {
            $Company = $this->companyRepository->checkCompany(trim($dataCompany['name']));
            if (empty($Company)) {

                $id = $this->companyRepository->insert($dataCompany);
                $dataCompany['id'] = $id;

            } else {
                $dataCompany['id'] = $Company->id;
                $dataCompany['company_description_id'] = $Company->company_description_id;
                $this->companyRepository->update($dataCompany);
                $dataCompany['id'] = $Company->id;
            }
            array_push($arrCompany, $dataCompany);
        }

        return $arrCompany;
    }

    protected function insertJob($dataInserts, $dataCompanyInsert)
    {
        $arrJobId = [];
        foreach ($dataInserts as $key => $dataInsert) {
            $job = $this->jobRepository->checkJob($dataInsert['job']['id'], $dataCompanyInsert[$key]['id']);

            if (empty($job)) {
                //todo insert new job
                $dataInsert['job']['created_at'] = date('Y-m-d H:i:s');
                $dataInsert['job']['updated_at'] = date('Y-m-d H:i:s');
                $dataInsert['job']['type'] = self::JOB_CRAWLER;
                $dataInsert['employ_description']['created_at'] = date('Y-m-d H:i:s');
                $dataInsert['employ_description']['updated_at'] = date('Y-m-d H:i:s');
                $dataInsert['job_description']['created_at'] = date('Y-m-d H:i:s');
                $dataInsert['job_description']['updated_at'] = date('Y-m-d H:i:s');
                $dataInsert['job']['company_id'] = $dataCompanyInsert[$key]['id'];
                $dataInsert['job']['job_description_id'] = $this->insertJobDescriptionRepository->insert($dataInsert['job_description']);
                $dataInsert['job']['employee_description_id'] = $this->employDescriptionRepository->insert($dataInsert['employ_description']);
                $id = $this->jobRepository->insert($dataInsert['job']);
                $this->insertContactRepository->insert($dataInsert['contact'], $id);
                array_push($arrJobId, $id);
            } else {
                //todo update job
                $dataInsert['job']['updated_at'] = date('Y-m-d H:i:s');
                $dataInsert['job']['type'] = self::JOB_CRAWLER;
                $dataInsert['employ_description']['id'] = $job->employee_description_id;
                $dataInsert['employ_description']['updated_at'] = date('Y-m-d H:i:s');
                $dataInsert['job_description']['updated_at'] = date('Y-m-d H:i:s');
                $dataInsert['job_description']['id'] = $job->job_description_id;
                $dataInsert['job']['job_description_id'] = $job->job_description_id;
                $dataInsert['job']['employee_description_id'] = $job->employee_description_id;
                $dataInsert['job']['company_id'] = $job->company_id;
                var_dump($key);
                $this->insertJobDescriptionRepository->update($dataInsert['job_description']);
                $this->employDescriptionRepository->update($dataInsert['employ_description']);
                $this->jobRepository->update($dataInsert['job']);
                $this->insertContactRepository->insert($dataInsert['contact'], $job->id);
                array_push($arrJobId, $job->id);
            }
        }

        return $arrJobId;
    }

    protected function insertJobContact($dataInsert)
    {

        if (array_key_exists('inserts', $dataInsert)) {
            $this->jobContactRepository->insert($dataInsert['inserts']);
        }
        if (array_key_exists('updates', $dataInsert)) {
            $this->jobContactRepository->update($dataInsert['updates']);
        }
    }

    protected function insertJobDetail($dataInsert)
    {
        if (array_key_exists('inserts', $dataInsert)) {
            $this->jobDetailRepository->insert($dataInsert['inserts']);
        }
        if (array_key_exists('updates', $dataInsert)) {
            $this->jobDetailRepository->update($dataInsert['updates']);
        }
    }
}
