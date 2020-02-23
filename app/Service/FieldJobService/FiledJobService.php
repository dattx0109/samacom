<?php
namespace App\Service\FieldJobService;

use App\Repository\Field\FieldJobRepository;

class FiledJobService
{

    private $jobRepository;

    public function __construct(FieldJobRepository $jobRepository)
    {
        $this->jobRepository = $jobRepository;
    }

    public function getAllField()
    {
        $rawData =  $this->jobRepository->getAllField();
        return $this->refactorAllField($rawData);
    }

    public function refactorAllField($rawData)
    {
        $rawDataNew = [];
        foreach ($rawData as $key => $item){
            $rawDataNew[] = [
                'id'   => $key,
                'name' => $item
            ];
        }
        return $rawDataNew;
    }
    public function getListField()
    {
       return $this->jobRepository->getListFieldWork();
    }
}
