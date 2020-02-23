<?php

namespace App\Repository\Jobs;

use Exception;
use Illuminate\Support\Facades\DB;

class JobRepository
{
    const TABLE_NAME = 'jobs';

    public function insert($dataInsert)
    {
      return  DB::table(self::TABLE_NAME)->insertGetId([
            "crawler_job_id" => $dataInsert['id'],
            "title" => $dataInsert['title'],
            "income_min" => $dataInsert['income_min'],
            "income_max" => $dataInsert['income_max'],
            "base_salary_min" => $dataInsert['base_salary_min'],
            "base_salary_max" => $dataInsert['base_salary_max'],
            "workplace" => $dataInsert['workplace'],
            "sex" => $dataInsert['sex'],
            "created_at" => $dataInsert['created_at'],
            "job_description_id" => $dataInsert['job_description_id'],
            "employee_description_id" => $dataInsert['employee_description_id'],
            "updated_at" => $dataInsert['updated_at'],
            "company_id" => $dataInsert['company_id'],
        ]);
    }
    public function update($dataInsert)
    {
        DB::table(self::TABLE_NAME)->where('crawler_job_id', $dataInsert['id'])->where('company_id',
            $dataInsert['company_id'])->update([
            "crawler_job_id" => $dataInsert['id'],
            "title" => $dataInsert['title'],
            "income_min" => $dataInsert['income_min'],
            "income_max" => $dataInsert['income_max'],
            "base_salary_min" => $dataInsert['base_salary_min'],
            "base_salary_max" => $dataInsert['base_salary_max'],
            "workplace" => $dataInsert['workplace'],
            "sex" => $dataInsert['sex'],
            "updated_at" => $dataInsert['updated_at'],
            "job_description_id" => $dataInsert['job_description_id'],
            "employee_description_id" => $dataInsert['employee_description_id'],
            "company_id" => $dataInsert['company_id']
        ]);
    }
    public function checkJob($CrawlerJoId,$companyId)
    {
        return DB::table(self::TABLE_NAME)->where('crawler_job_id', $CrawlerJoId)->where('company_id',
            $companyId)->first();
    }
}
