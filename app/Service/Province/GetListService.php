<?php

namespace App\Service\Province;

use App\Repository\Province\GetListRepository;

class GetListService
{
    private $getListRepository;

    public function __construct(GetListRepository $getListRepository)
    {
        $this->getListRepository = $getListRepository;
    }

    public function getList()
    {
        return $this->getListRepository->getListDataProvince();
    }

    public function getAllProvinceAndDistricts()
    {
        $rawData = $this->getListRepository->getAllDataProvince();
        return $this->refactorData($rawData);
    }

    public function refactorData($rawData)
    {
        $listProvince = [];
        $listDistrict = [];

        foreach ($rawData as $item){
            $listProvince[$item->id] = $item;
            $listDistrict[$item->id][] = $item;
        }
        return [$listProvince, $listDistrict];
    }
}
