<?php

namespace App\Service\AccountExperience;

use App\Repository\AccountExperience\AccountExperienceRepository;

class AccountExperienceService
{
    private $accountExperienceRepository;
    public function __construct(AccountExperienceRepository $accountExperienceRepository)
    {
        $this->accountExperienceRepository = $accountExperienceRepository;
    }

    public function create($dataCreate)
    {
        $rawData = [
            'start_time' =>date("Y-m-d",strtotime($dataCreate['start_time'])) ,
            'end_time' =>date("Y-m-d",strtotime($dataCreate['end_time'])) ,
            'position' => $dataCreate['position'],
            'company' => $dataCreate['company'],
            'field_work' => $dataCreate['field_work'],
            'description' => $dataCreate['description'],
            'account_id' => request()->user->id,
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s')
        ];
       return $this->accountExperienceRepository->insert($rawData);
    }
    public function delete($id)
    {
      return  $this->accountExperienceRepository->delete($id);
    }

    public function getDataAccountExpByAccountId()
    {
     return $this->accountExperienceRepository->getDataAccountExpByAccountId();
    }

    public function getDataAccountExpByIdAccountExp($id)
    {
        return $this->accountExperienceRepository->getDataAccountExpByIdAccountExp($id);
    }

    public function getDataAccountExpByIdAccountExpForUpdateExp($id)
    {
        return $this->accountExperienceRepository->getDataAccountExpByIdAccountExpForUpdateExp($id);
    }

    public function update($dataUpdate)
    {
        $rawData = [
            'start_time'    =>date("Y-m-d",strtotime($dataUpdate['start_time'])) ,
            'end_time'      =>date("Y-m-d",strtotime($dataUpdate['end_time'])) ,
            'position'      => $dataUpdate['position'],
            'company'       => $dataUpdate['company'],
            'field_work'    => $dataUpdate['field_work'],
            'description'   => $dataUpdate['description'],
            'id'            => $dataUpdate['id'],
            'account_id'    => request()->user->id,
            'created_at'    => date('Y-m-d H:i:s'),
            'updated_at'    => date('Y-m-d H:i:s')
        ];
        return $this->accountExperienceRepository->update($rawData['id'], $rawData);
    }
}
