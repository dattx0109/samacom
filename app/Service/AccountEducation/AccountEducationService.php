<?php

namespace App\Service\AccountEducation;

use App\Repository\AccountEducation\AccountEducationRepository;

class AccountEducationService
{
    private $accountEducationRepository;

    public function __construct(AccountEducationRepository $accountEducationRepository)
    {
        $this->accountEducationRepository = $accountEducationRepository;
    }
    public function insert($dataRaw)
    {
        $dataInsert = [
            'account_id'=> request()->user->id,
            'school'=> $dataRaw['school'],
            'description'=> $dataRaw['description'],
            'filed_study'=> $dataRaw['filed_study'],
            'degree'=> $dataRaw['degree'],
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s'),
            'start_time' =>date("Y-m-d",strtotime($dataRaw['start_time'])) ,
            'end_time' =>date("Y-m-d",strtotime($dataRaw['end_time'])) ,

        ];
       return $this->accountEducationRepository->insert($dataInsert);
    }
    public function delete($id)
    {
        return $this->accountEducationRepository->delete($id);
    }

    public function getData()
    {
        return $this->accountEducationRepository->getAccountEdu();
    }

    public function getAccountEduId($id)
    {
        return $this->accountEducationRepository->getAccountEduId($id);
    }

    public function updateAccountEduId($rawDate,$id)
    {
        $dataInsert = [
            'id' => $id,
            'account_id'=> request()->user->id,
            'school'=> $rawDate['school'],
            'description'=> $rawDate['description'],
            'filed_study'=> $rawDate['filed_study'],
            'degree'=> $rawDate['degree'],
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s'),
            'start_time' =>date("Y-m-d",strtotime($rawDate['start_time'])) ,
            'end_time' =>date("Y-m-d",strtotime($rawDate['end_time'])) ,

        ];
        return $this->accountEducationRepository->updateAccountEduId($dataInsert,$id);
    }
}
