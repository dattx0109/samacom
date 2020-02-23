<?php

namespace App\Service\EmployerFilter;

use App\Repository\EmployerFilter\EmployerFilterRepository;
use App\Repository\User\UserRepository;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class EmployerFilterService
{
    private $employerFilterRepository;
    private $userRepository;

    public function __construct(EmployerFilterRepository $employerFilterRepository, UserRepository $userRepository)
    {
        $this->employerFilterRepository = $employerFilterRepository;
        $this->userRepository = $userRepository;
    }

    public function store($dataInsert)
    {
        DB::beginTransaction();
        try {
            if ($dataInsert['is_account'] == 0) {
                $account_id = $this->insertAccount($dataInsert);
            } else {
                $account = $this->userRepository->getUserByPhone($dataInsert['phone']);
                $account_id = $account->id;
            }
            $dataFilter = $this->mergeDataFilter($dataInsert);
            $this->employerFilterRepository->store($account_id, $dataFilter);
            DB::commit();
            return ;
        } catch (\Exception $e) {
            DB::rollBack();
        }
    }

    public function insertAccount($dataInsert)
    {
        $rawData = [
            'name' => $dataInsert['name'],
            'email' => $dataInsert['email'],
            'password' => Hash::make(UserRepository::PASSWORD_DEFAULT),
            'phone' => $dataInsert['phone'],
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s')
        ];

        return $this->userRepository->insertUser($rawData);
    }
    public function mergeDataFilter($dataInsert)
    {
        $dataFilter = [];
        $dataFilter['dateofbirth'] = $dataInsert['dateofbirth'];
        $dataFilter['district'] = $dataInsert['district'];
        $dataFilter['province'] = $dataInsert['province'];
        $dataFilter['field'] = $dataInsert['field'];
        $dataFilter['sale_type'] = $dataInsert['sale_type'];
        $dataFilter['forcus'] = $dataInsert['forcus'];
        $dataFilter['exp'] = $dataInsert['exp'];
        $dataFilter['skill'] = $dataInsert['skill'];
        $dataFilter['character'] = $dataInsert['character'];
        $dataFilter['base_salary_min'] = $dataInsert['base_salary_min'];
        $dataFilter['base_salary_max'] = $dataInsert['base_salary_max'];
        $dataFilter['income_min'] = $dataInsert['income_min'];
        $dataFilter['income_max'] = $dataInsert['income_max'];
        $dataFilter['benefit'] = $dataInsert['benefit'];
        $dataFilter['search_job_type'] = $dataInsert['search_job_type'];
        return $dataFilter;
    }
}
