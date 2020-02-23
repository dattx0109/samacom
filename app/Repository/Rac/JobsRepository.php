<?php


namespace App\Repository;


use App\Repository\character\CharacterRepository;
use App\Repository\CompanyBenefit\CompanyBenefitRepository;
use App\Repository\Contact\ContactRepository;
use App\Repository\Districts\DistrictRepository;
use App\Repository\EmployDescription\EmployDescriptionRepository;
use App\Repository\JobDescription\JobDescriptionRepository;
use App\Repository\Companies\CompanyRepository;
use App\Repository\Province\ProvinceRepository;
use App\Repository\Skill\SkillRepository;
use Illuminate\Support\Facades\DB;

class jobsRepository
{
    const TABLE_NAME = 'jobs';
    const TABLE_SKILL_JOB = 'skill_job';
    const TABLE_CHARACTER_JOB = 'character_job';
    const TABLE_FIELD_WORK = 'field_work';
    const TABLE_JOBS = 'jobs';
    const TABLE_DETAIL_JOB = 'job_detail';
    const TABLE_JOB_CONTACT = 'job_contact';
    const TABLE_COMPANIES = 'companies';
    const ITEM_OF_PAGE = 10;

    public function getListJob()
    {
        return DB::table(self::TABLE_JOBS)
            ->join(self::TABLE_COMPANIES,'company_id','=',self::TABLE_COMPANIES.'.id')
            ->select(self::TABLE_COMPANIES.'.name',self::TABLE_COMPANIES.'.logo',self::TABLE_JOBS.'.title',
                self::TABLE_JOBS.'.income_min',self::TABLE_JOBS.'.income_max',self::TABLE_JOBS.'.base_salary_min',
                self::TABLE_JOBS.'.base_salary_max',self::TABLE_JOBS.'.workplace_full_text'
                ,self::TABLE_JOBS.'.job_publish',self::TABLE_JOBS.'.job_expire',self::TABLE_JOBS.'.job_type',
                self::TABLE_JOBS.'.id as id_job')
            ->paginate(self::ITEM_OF_PAGE)
            ;
    }

    public function getJobDetailByJobId($jobId)
    {
        $detailJob = DB::table(self::TABLE_NAME)
            ->leftJoin(JobDescriptionRepository::TABLE_NAME, self::TABLE_NAME . '.job_description_id', '=', JobDescriptionRepository::TABLE_NAME . '.id')
            ->leftJoin(ContactRepository::TABLE_NAME, self::TABLE_NAME . '.id', '=', ContactRepository::TABLE_NAME . '.job_id')
            ->leftJoin(CompanyRepository::TABLE_NAME, self::TABLE_NAME . '.company_id', '=', CompanyRepository::TABLE_NAME . '.id')
            ->leftJoin(self::TABLE_FIELD_WORK, self::TABLE_NAME.'.field_work_id', '=', self::TABLE_FIELD_WORK.'.id')
            ->leftJoin(ProvinceRepository::TABLE_NAME, self::TABLE_NAME.'.province_id', '=', ProvinceRepository::TABLE_NAME.'.id')
            ->leftJoin(DistrictRepository::TABLE_NAME, self::TABLE_NAME.'.district_id', '=', DistrictRepository::TABLE_NAME.'.id')
            ->leftJoin(EmployDescriptionRepository::TABLE_NAME, self::TABLE_NAME.'.employee_description_id', '=', EmployDescriptionRepository::TABLE_NAME.'.id')

            ->where(self::TABLE_NAME . '.id', $jobId)
            ->select(
                CompanyRepository::TABLE_NAME.'.logo',
                CompanyRepository::TABLE_NAME.'.name as name_company',
                CompanyRepository::TABLE_NAME.'.short_name as short_name_company',
                CompanyRepository::TABLE_NAME.'.website as website_company',
                CompanyRepository::TABLE_NAME.'.address as workplace_detail_company',
                CompanyRepository::TABLE_NAME.'.workplace as province_company',
                CompanyRepository::TABLE_NAME.'.district as district_company',
                ProvinceRepository::TABLE_NAME.'.name as province_company',
                DistrictRepository::TABLE_NAME.'.name as district_company',
                DistrictRepository::TABLE_NAME.'.prefix as prefix_district_company',
                self::TABLE_NAME.'.title as title_job',
                self::TABLE_NAME.'.job_publish',
                self::TABLE_NAME.'.job_expire',
                self::TABLE_NAME.'.base_salary_min',
                self::TABLE_NAME.'.base_salary_max',
                self::TABLE_NAME.'.income_min',
                self::TABLE_NAME.'.income_max',
                self::TABLE_NAME.'.workplace_full_text as workplace_detail_job',
                self::TABLE_NAME.'.district_id as district_job',
                self::TABLE_NAME.'.province_id as province_job',
                self::TABLE_NAME.'.gender',
                self::TABLE_NAME.'.level_id as getRank', // xem helper
                self::TABLE_NAME.'.job_type',
                self::TABLE_NAME.'.count_apply',
                self::TABLE_FIELD_WORK.'.name as name_field_work',
                EmployDescriptionRepository::TABLE_NAME.'.degree',
                EmployDescriptionRepository::TABLE_NAME.'.experience',
                EmployDescriptionRepository::TABLE_NAME.'.appearance',
                JobDescriptionRepository::TABLE_NAME . '.description as description_job'
            )
            ->first();
        $skillJob = DB::table(SkillRepository::TABLE_NAME)
            ->leftJoin(self::TABLE_SKILL_JOB, SkillRepository::TABLE_NAME . '.id', '=', self::TABLE_SKILL_JOB . '.skill_id')
            ->where( self::TABLE_SKILL_JOB . '.job_id', $jobId)
            ->get()
            ->toArray()
        ;
        if(!empty($skillJob)){
            $detailJob->skillJob = $skillJob;
        }

        $characterJob = DB::table(CharacterRepository::TABLE_NAME)
            ->leftJoin(self::TABLE_CHARACTER_JOB, CharacterRepository::TABLE_NAME . '.id', '=', self::TABLE_CHARACTER_JOB . '.character_id')
            ->where( self::TABLE_CHARACTER_JOB . '.job_id', $jobId)
            ->get()
            ->toArray()
        ;
        if(!empty($characterJob)){
            $detailJob->characterJob = $characterJob;
        }

        $companyBenefit = DB::table(self::TABLE_NAME)
            ->leftJoin(CompanyRepository::TABLE_NAME, self::TABLE_NAME . '.company_id', '=', CompanyRepository::TABLE_NAME . '.id')
            ->leftJoin(CompanyBenefitRepository::TABLE_NAME, CompanyRepository::TABLE_NAME . '.id', '=', CompanyBenefitRepository::TABLE_NAME . '.company_id')
            ->where( self::TABLE_NAME . '.id', $jobId)
            ->select(
                CompanyBenefitRepository::TABLE_NAME.'.name as name_benefit',
                CompanyBenefitRepository::TABLE_NAME.'.icon',
                CompanyBenefitRepository::TABLE_NAME.'.description as description_benefit'
            )
            ->get()
            ->toArray()
        ;
        if(!empty($companyBenefit)){
            $detailJob->companyBenefit = $companyBenefit;
        }

        return $detailJob;
    }

    public function searchJobByName($name)
    {
        return DB::table(self::TABLE_NAME)
            ->where('job_name','like','%'.$name.'%')
            ->paginate(self::ITEM_OF_PAGE)
            ;
    }

    public function getIdCompanyBuJobId($jobId)
    {
        return DB::table(self::TABLE_NAME)
            ->Join(CompanyRepository::TABLE_NAME, self::TABLE_NAME . '.company_id', '=', CompanyRepository::TABLE_NAME . '.id')
            ->where( self::TABLE_NAME . '.id', $jobId)
            ->select(
                CompanyRepository::TABLE_NAME.'.id as company_id'
            )
            ->first()
            ;
    }

    public function getListJobSameCompany($companyId)
    {
        return DB::table(self::TABLE_NAME)
            ->where( self::TABLE_NAME . '.company_id', $companyId)
            ->select(
                self::TABLE_NAME .'.title as name_job',
                self::TABLE_NAME .'.income_min',
                self::TABLE_NAME .'.income_max',
                self::TABLE_NAME .'.income_max',
                self::TABLE_NAME .'.id as job_id'
            )
            ->get()
        ;
    }
}
