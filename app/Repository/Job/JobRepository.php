<?php
namespace App\Repository\Job;

use App\Repository\Companies\CompanyRepository;
use App\Repository\Tag\TagRepository;
use Illuminate\Support\Facades\DB;

class JobRepository
{
    const TABLE_NAME = 'jobs';
    const SKILL_JOB_TABLE = 'skill_job';
    const CHARACTER_JOB = 'character_job';
    const PROVINCES_TABLE = 'provinces';
    const DISTRICS_TABLE = 'districts';

    public function getAllJobByProvinceId($provinceId)
    {
        return DB::table(self::TABLE_NAME)
            ->select(
                self::TABLE_NAME.'.id as jobId', self::TABLE_NAME.'.*',
                         TagRepository::TABLE_NAME.'.tag_id',
                         self::SKILL_JOB_TABLE.'.skill_id',
                         self::CHARACTER_JOB.'.character_id'
            )
            ->leftJoin(TagRepository::TABLE_NAME,TagRepository::TABLE_NAME.'.job_id', '=', self::TABLE_NAME.'.id')
            ->leftJoin(self::SKILL_JOB_TABLE, self::SKILL_JOB_TABLE.'.job_id', '=', self::TABLE_NAME.'.id')
            ->leftJoin(self::CHARACTER_JOB, self::CHARACTER_JOB.'.job_id', '=', self::TABLE_NAME.'.id')
            ->where(self::TABLE_NAME.'.province_id', $provinceId)
            ->where(self::TABLE_NAME.'.is_show', 1)
            ->where(self::TABLE_NAME.'.is_public', 1)
            ->orderBy(self::TABLE_NAME.'.id', 'DESC')
            ->get()
        ;

    }

    public function getAllJobInfoByListJobId($listJobId)
    {
        return DB::table(self::TABLE_NAME)
            ->select(
                self::TABLE_NAME.'.id as jobId', self::TABLE_NAME.'.*',
                CompanyRepository::TABLE_NAME.'.logo', CompanyRepository::TABLE_NAME.'.name as companyName',
                self::DISTRICS_TABLE.'.name as districtName',
                self::PROVINCES_TABLE.'.name as provinceName'
            )
            ->leftJoin(CompanyRepository::TABLE_NAME,CompanyRepository::TABLE_NAME.'.id', '=', self::TABLE_NAME.'.company_id')
            ->leftJoin(self::DISTRICS_TABLE, self::DISTRICS_TABLE.'.id', '=', self::TABLE_NAME.'.district_id')
            ->leftJoin(self::PROVINCES_TABLE, self::PROVINCES_TABLE.'.id', '=', self::TABLE_NAME.'.province_id')
            ->whereIn(self::TABLE_NAME.'.id', $listJobId)
//            ->leftJoin(self::CHARACTER_JOB, self::CHARACTER_JOB.'.job_id', '=', self::TABLE_NAME.'.id')
//            ->where('province_id', $provinceId)
            ->get()
            ;
    }
}