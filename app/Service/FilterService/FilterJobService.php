<?php

namespace App\Service\FilterService;


use App\Repository\Job\JobRepository;

class FilterJobService
{
    const TOTAL_JOB_CALCULATOR = 3;
    private $jobRepository;

    public function __construct(JobRepository $jobRepository)
    {
        $this->jobRepository = $jobRepository;
    }

    public function run($rawData)
    {
        $provinceId = $rawData['province_id'];
        $jobs = $this->getJobByProvinceId($provinceId);
        $jobs = $this->refactorJob($jobs);
        $listJobId = $this->calculatorJob($jobs, $rawData);
        $jobInfo = $this->getInfoJobByListId($listJobId);
        return $jobInfo;
    }

    public function getJobByProvinceId($provinceId)
    {
        $data = $this->jobRepository->getAllJobByProvinceId($provinceId);
        return $data;
    }

    public function getInfoJobByListId($listId)
    {
        return $this->jobRepository->getAllJobInfoByListJobId($listId);
    }

    public function calculatorJob($rawData, $filterData)
    {

        $rawDataNew = [];
        foreach ($rawData as $item){
            $point = 0;
            if($filterData['base_salary_max'] <= $item['base_salary_max']){
                $point ++;
            }

            if($filterData['income_max'] <= $item['income_max']){
                $point ++;
            }


            // handle tag
            if(isset($filterData['tag_id'][0]) && isset($item['tag_id'][$filterData['tag_id'][0]])){
                $point ++;
            }

            if(isset($filterData['tag_id'][2]) && isset($item['tag_id'][$filterData['tag_id'][2]])){
                $point ++;
            }
            if(isset($filterData['tag_id'][1]) && isset($item['tag_id'][$filterData['tag_id'][1]])){
                $point ++;
            }

            // handle field
            if(isset($filterData['skill_id'][0]) && isset($item['skill_id'][$filterData['skill_id'][0]])){
                $point ++;
            }
            if(isset($filterData['skill_id'][4]) && isset($item['skill_id'][$filterData['skill_id'][4]])){
                $point ++;
            }
            if(isset($filterData['skill_id'][3]) && isset($item['skill_id'][$filterData['skill_id'][3]])){
                $point ++;
            }
            if(isset($filterData['skill_id'][2]) && isset($item['skill_id'][$filterData['skill_id'][2]])){
                $point ++;
            }
            if(isset($filterData['skill_id'][1]) && isset($item['skill_id'][$filterData['skill_id'][1]])){
                $point ++;
            }

            // handle character
            if(isset($filterData['character_id'][0]) && isset($item['character_id'][$filterData['character_id'][0]])){
                $point ++;
            }
            if(isset($filterData['character_id'][4]) && isset($item['character_id'][$filterData['character_id'][4]])){
                $point ++;
            }
            if(isset($filterData['character_id'][3]) && isset($item['character_id'][$filterData['character_id'][3]])){
                $point ++;
            }
            if(isset($filterData['character_id'][2]) && isset($item['character_id'][$filterData['character_id'][2]])){
                $point ++;
            }
            if(isset($filterData['character_id'][1]) && isset($item['character_id'][$filterData['character_id'][1]])){
                $point ++;
            }
            $item['point'] = $point;
            if(! isset($rawDataNew[$point])){
                $rawDataNew[$point][] = $item;
            }else{
                if(count($rawDataNew[$point]) < self::TOTAL_JOB_CALCULATOR){
                    $rawDataNew[$point][] = $item;
                }
            }
        }
        return $this->getJobSuccess($rawDataNew);
    }

    public function getJobSuccess($rawData)
    {
        $rawDataNew = [];
        foreach ($rawData as $items){
            foreach ($items as $item){
                if(count($rawDataNew) < self::TOTAL_JOB_CALCULATOR){
                    $rawDataNew[] = $item['job_id'];
                }
            }
        }
        return $rawDataNew;
    }

    public function refactorJob($rawData)
    {
        $rawDataNew = [];

        foreach ($rawData as $item){
            $rawDataNew[$item->jobId]['job_id'] = $item->jobId;
            $rawDataNew[$item->jobId]['title'] = $item->title;
            $rawDataNew[$item->jobId]['job_publish'] = $item->job_publish;
            $rawDataNew[$item->jobId]['job_expire'] = $item->job_expire;
            $rawDataNew[$item->jobId]['income_min'] = $item->income_min;
            $rawDataNew[$item->jobId]['income_max'] = $item->income_max;
            $rawDataNew[$item->jobId]['base_salary_min'] = $item->base_salary_min;
            $rawDataNew[$item->jobId]['base_salary_max'] = $item->base_salary_max;
            $rawDataNew[$item->jobId]['province_id'] = $item->province_id;
            $rawDataNew[$item->jobId]['district_id'] = $item->district_id;
            $rawDataNew[$item->jobId]['gender'] = $item->gender;
            $rawDataNew[$item->jobId]['field_work_id'][$item->field_work_id] = $item->field_work_id;
            $rawDataNew[$item->jobId]['tag_id'][$item->tag_id] = $item->tag_id;
            $rawDataNew[$item->jobId]['skill_id'][$item->skill_id] = $item->skill_id;
            $rawDataNew[$item->jobId]['character_id'][$item->character_id] = $item->character_id;
        }
        return $rawDataNew;
    }

}