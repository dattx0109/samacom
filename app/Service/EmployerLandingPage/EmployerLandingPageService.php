<?php


namespace App\Service\EmployerLandingPage;


use App\Repository\EmployerLandingPage\EmployerLandingPageRepository;

class EmployerLandingPageService
{

    private $employerLandingPageRepository;

    public function __construct(EmployerLandingPageRepository $employerLandingPageRepository)
    {
        $this->employerLandingPageRepository = $employerLandingPageRepository;
    }

    public function insertAdvisoryLandingPage($rawData)
    {
        $rawDataInsert = [
            'name' => $rawData['name'],
            'email' => $rawData['email'],
            'phone' => $rawData['phone'],
            'name_company' => $rawData['name_company'],
            'status'        => 1,
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s')
        ];
        return $this->employerLandingPageRepository->insert($rawDataInsert);
    }

    public function insertAdvisoryPackage1($rawData)
    {
        $rawDataInsert = [
            'name'          => $rawData['name'],
            'email'         => $rawData['email'],
            'phone'         => $rawData['phone'],
            'package_id'    => $rawData['package'],
            'number'        => $rawData['field'],
            'status'        => 1,
            'created_at'    => date('Y-m-d H:i:s'),
            'updated_at'    => date('Y-m-d H:i:s')
        ];
        return $this->employerLandingPageRepository->insert($rawDataInsert);
    }
}
