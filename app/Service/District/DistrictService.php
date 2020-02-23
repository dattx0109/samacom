<?php


namespace App\Service\District;


use App\Repository\Districts\DistrictRepository;

class DistrictService
{
    private $districtRepository;

    public function __construct(DistrictRepository $districtRepository)
    {
        $this->districtRepository = $districtRepository;
    }

    public function getList($province_id)
    {
        return $this->districtRepository->getList($province_id);
    }

    public function getListDistrict()
    {
        return $this->districtRepository->getListDistrict();
    }

    public function getListDistrictsByProvinceId($provinceId)
    {
        return $this->districtRepository->getListDistrictsByProvinceId($provinceId);
    }
}
