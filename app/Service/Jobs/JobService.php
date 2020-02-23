<?php


namespace App\Service\Jobs;

use App\Mail\Mailer;
use App\Repository\Field\FieldJobRepository;
use App\Repository\Jobs\JobsRepository;
use App\Repository\Tag\TagRepository;
use http\Env\Request;

class JobService
{
    private $jobsRepository;
    private $tagRepository;
    private $fieldJobRepository;

    public function __construct(JobsRepository $jobsRepository,
                                TagRepository $tagRepository,
                                FieldJobRepository $fieldJobRepository)
    {
        $this->jobsRepository = $jobsRepository;
        $this->tagRepository = $tagRepository;
        $this->fieldJobRepository = $fieldJobRepository;
    }

    public function getListJob($rawData)
    {
        $listJobTag = $this->tagRepository->getListJobTag($rawData);
        $rawData['listIdJob'] = isset($rawData['group_sale']) ? $listJobTag->pluck('job_id') : [];
        $listJobTagGroup = $listJobTag->groupBy('job_id')->toArray();
        $listJob = $this->jobsRepository->getListJob($rawData);
        function timeAgo($date)
        {
            $timestamp = strtotime($date);
            $strTime = array("giây", "phút", "giờ", "ngày", "tháng", "năm");
            $length = array("60", "60", "24", "30", "12", "10");
            $currentTime = time();
            if ($currentTime >= $timestamp) {
                $diff = time() - $timestamp;
                for ($i = 0; $diff >= $length[$i] && $i < count($length) - 1; $i++) {
                    $diff = $diff / $length[$i];
                }
                $diff = round($diff);
                return "cách đây " . $diff . " " . $strTime[$i];
            }
        }

        $listField = $this->fieldJobRepository->getAllField();
        foreach (($listJob->items()) as $item) {
            $timeUpdate = $item->created_at;
            if (!empty($timeUpdate)) {
                $strTimeAgo = timeAgo($timeUpdate);
                $item->updateAgo = $strTimeAgo;
            }

            if (array_key_exists($item->id_job, $listJobTagGroup)) {
                $item->tag = $listJobTagGroup[$item->id_job];
            }
            $item->tag_sales = getParseSales($item->tag_id);
            $item->fieldWorkName = $listField[$item->field_work_id];
        }

        return $listJob;
    }


    public function getListProvince()
    {
        return $this->jobsRepository->getListProvince();
    }

    public function getListDistrictByProvinceId($provinceId)
    {
        return $this->jobsRepository->getListDistrictByProvinceId($provinceId);
    }

    public function getJobDetailByJobId($jobId)
    {
        return $this->jobsRepository->getJobDetailByJobId($jobId);
    }

    public function getJobDetailBySlug($slug)
    {
        return $this->jobsRepository->getJobDetailBySlug($slug);
    }

    public function getJobDetailApi($jobId)
    {
        return $this->jobsRepository->getJobByIdRaw($jobId);
    }

    public function searchJob($name)
    {
        return $this->jobsRepository->searchJobByName($name);
    }

    public function getListJobSameCompany($jobId)
    {
        $company = $this->jobsRepository->getIdCompanyBuJobId($jobId);
        $companyId = $company->company_id;
        $dataJob = $this->jobsRepository->getListJobSameCompany($companyId);
        return $dataJob;
    }


    public function recordNumberEmployeeApplyForJob($jobId)
    {
        $takeCountApplyBefore = $this->jobsRepository->getCountApply($jobId);
        $countApplyBefore = $takeCountApplyBefore[0]->count_apply;
        if ($countApplyBefore == null) {
            $countApplyBefore = 0;
        }
        $this->jobsRepository->recordNumberEmployeeApplyForJob($jobId, $countApplyBefore);
    }

    public function getListJobIdByTagId($jobTag)
    {
        $listTag = $this->jobsRepository->getListJobIdByTagId($jobTag);
        $listJobId = $this->refactorRawData($listTag);
        return $listJobId;
    }

    public function refactorRawData($rawData)
    {
        $rawDataId = [];
        foreach ($rawData as $item){
            $rawDataId[] = $item->job_id;
        }
        return $rawDataId;
    }

    public function getListJobByListJobId($listJobId, $jobId)
    {
        return $this->jobsRepository->getListJobByListJobId($listJobId, $jobId);
    }
}
