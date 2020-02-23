<?php


namespace App\Repository\Jobs;


use App\Repository\Character\CharacterRepository;
use App\Repository\CompanyBenefit\CompanyBenefitRepository;
use App\Repository\Contact\ContactRepository;
use App\Repository\Districts\DistrictRepository;
use App\Repository\EmployDescription\EmployDescriptionRepository;
use App\Repository\JobDescription\JobDescriptionRepository;
use App\Repository\Companies\CompanyRepository;
use App\Repository\Province\ProvinceRepository;
use App\Repository\Skill\SkillRepository;
use App\Repository\Tag\TagRepository;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Query\Builder;
use Illuminate\Support\Facades\DB;

class jobsRepository
{
    const TABLE_NAME = 'jobs';
    const TABLE_SKILL_JOB = 'skill_job';
    const TABLE_CHARACTER_JOB = 'character_job';
    const TABLE_FIELD_WORK = 'field_work';
    const TABLE_PROVINCES = 'provinces';
    const TABLE_DISTRICTS = 'districts';
    const ITEM_OF_PAGE = 12;
    const JOB_PUBLIC = 1;
    const JOB_SHOW = 1;

    public function getListJob($rawData)
    {
        $filterJob = DB::table(self::TABLE_NAME)
            ->join(CompanyRepository::TABLE_NAME, 'company_id', '=', CompanyRepository::TABLE_NAME . '.id')
            ->join( TagRepository::TABLE_NAME, self::TABLE_NAME.'.id', '=', TagRepository::TABLE_NAME.'.job_id')
            ->select(CompanyRepository::TABLE_NAME . '.name', CompanyRepository::TABLE_NAME . '.logo', self::TABLE_NAME . '.title',
                self::TABLE_NAME . '.income_min', self::TABLE_NAME . '.income_max', self::TABLE_NAME . '.base_salary_min',
                self::TABLE_NAME . '.base_salary_max', self::TABLE_NAME . '.workplace_full_text', self::TABLE_NAME.'.updated_at'
                , self::TABLE_NAME . '.job_publish', self::TABLE_NAME . '.job_expire', self::TABLE_NAME . '.job_type',
                self::TABLE_NAME . '.level_id', self::TABLE_NAME . '.field_work_id', self::TABLE_NAME . '.id as id_job', self::TABLE_NAME . '.created_at',
                TagRepository::TABLE_NAME.'.tag_id', self::TABLE_NAME.'.district_id', self::TABLE_NAME.'.province_id',
                CompanyRepository::TABLE_NAME . '.short_name',  self::TABLE_NAME . '.slug'
            );
        if (isset($rawData['field'])) {
            $filterJob = $filterJob->where('field_work_id', $rawData['field']);
        }
        if (isset($rawData['rank'])) {
            $filterJob = $filterJob->where('level_id', $rawData['rank']);
        }
        if (isset($rawData['group_sale'])&& !empty($rawData['group_sale'])) {
            $filterJob = $filterJob->whereIn(self::TABLE_NAME.'.id', $rawData['listIdJob']);
        }

        if (isset($rawData['province_id'])) {
            $filterJob = $filterJob->where('province_id', $rawData['province_id']);
            if (isset($rawData['district_id'])) {
                $filterJob = $filterJob->where('district_id', $rawData['district_id']);
            }
        }
        if (isset($rawData['job_type'])) {
            $filterJob = $filterJob->where('job_type', $rawData['job_type']);
        }
        if (isset($rawData['sex'])) {
            $filterJob = $filterJob->where('gender', $rawData['sex']);
        }
        if (isset($rawData['income'])) {
            $isIncomeSmaller6 = 1;
            $isIncome6To8 = 2;
            $isIncome8To10 = 3;
            $isIncome10To12 = 4;
            $isIncome12To15 = 5;
            $isIncome15To20 = 6;
            $isIncome20To30 = 7;
            $isIncome30To50 = 8;
            $isIncome50To100 = 9;
            $isIncomeBigger100 = 10;
            if ($rawData['income'] == $isIncomeSmaller6) {
                $filterJob = $filterJob->where('income_max', '<', '6000000');
            }
            if ($rawData['income'] == $isIncome6To8) {
                $filterJob = $filterJob->where('income_max', '>=', '6000000');
                $filterJob = $filterJob->where('income_max', '<=', '8000000');
            }
            if ($rawData['income'] == $isIncome8To10) {
                $filterJob = $filterJob->where('income_max', '>=', '8000000');
                $filterJob = $filterJob->where('income_max', '<=', '10000000');
            }
            if ($rawData['income'] == $isIncome10To12) {
                $filterJob = $filterJob->where('income_max', '>=', '10000000');
                $filterJob = $filterJob->where('income_max', '<=', '12000000');
            }
            if ($rawData['income'] == $isIncome12To15) {
                $filterJob = $filterJob->where('income_max', '>=', '12000000');
                $filterJob = $filterJob->where('income_max', '<=', '15000000');
            }
            if ($rawData['income'] == $isIncome15To20) {
                $filterJob = $filterJob->where('income_max', '>=', '15000000');
                $filterJob = $filterJob->where('income_max', '<=', '20000000');
            }
            if ($rawData['income'] == $isIncome20To30) {
                $filterJob = $filterJob->where('income_max', '>=', '20000000');
                $filterJob = $filterJob->where('income_max', '<=', '30000000');
            }
            if ($rawData['income'] == $isIncome30To50) {
                $filterJob = $filterJob->where('income_max', '>=', '30000000');
                $filterJob = $filterJob->where('income_max', '<=', '50000000');
            }
            if ($rawData['income'] == $isIncome50To100) {
                $filterJob = $filterJob->where('income_max', '>=', '50000000');
                $filterJob = $filterJob->where('income_max', '<=', '100000000');
            }
            if ($rawData['income'] == $isIncomeBigger100) {
                $filterJob = $filterJob->where('income_max', '>', '100000000');
            }
        }
        if (isset($rawData['date_update']) && $rawData['date_update'] == 2) {
            $filterJob = $filterJob->orderBy(self::TABLE_NAME . '.created_at', 'asc');
        }
        if (isset($rawData['salary']) && $rawData['salary'] == 1) {
            $filterJob = $filterJob->orderBy(self::TABLE_NAME . '.income_max', 'asc');
        }
        if (isset($rawData['salary']) && $rawData['salary'] == 2) {
            $filterJob = $filterJob->orderBy(self::TABLE_NAME . '.income_max', 'desc');
        }
        return $filterJob
            ->where(self::TABLE_NAME . '.is_public',self::JOB_PUBLIC)
            ->where(self::TABLE_NAME . '.is_show',self::JOB_SHOW)
            ->orderBy(self::TABLE_NAME . '.created_at', 'desc')
            ->paginate(self::ITEM_OF_PAGE);
    }

    public function getListProvince()
    {
        return DB::table(self::TABLE_PROVINCES)->orderBy('name')
            ->get();
    }

    public function getListDistrictByProvinceId($provinceId)
    {
        return DB::table(self::TABLE_PROVINCES)
            ->leftJoin(self::TABLE_DISTRICTS, self::TABLE_PROVINCES . '.id', '=', self::TABLE_DISTRICTS . '.province_id')
            ->where('province_id', $provinceId)
            ->select(self::TABLE_PROVINCES . '.id as province_id', self::TABLE_PROVINCES . '.name as province_name',
                self::TABLE_DISTRICTS . '.id as district_id', self::TABLE_DISTRICTS . '.name as district_name', self::TABLE_DISTRICTS . '.prefix')
            ->get();
    }

    /**
     * @param $jobId
     * @return Model|Builder|object|null
     */
    public function getJobDetailByJobId($jobId)
    {
        $detailJob = DB::table(self::TABLE_NAME)
            ->leftJoin(JobDescriptionRepository::TABLE_NAME, self::TABLE_NAME . '.job_description_id', '=', JobDescriptionRepository::TABLE_NAME . '.id')
            ->leftJoin(ContactRepository::TABLE_NAME, self::TABLE_NAME . '.id', '=', ContactRepository::TABLE_NAME . '.job_id')
            ->leftJoin(CompanyRepository::TABLE_NAME, self::TABLE_NAME . '.company_id', '=', CompanyRepository::TABLE_NAME . '.id')
            ->leftJoin(self::TABLE_FIELD_WORK, self::TABLE_NAME . '.field_work_id', '=', self::TABLE_FIELD_WORK . '.id')
            ->leftJoin(ProvinceRepository::TABLE_NAME, self::TABLE_NAME . '.province_id', '=', ProvinceRepository::TABLE_NAME . '.id')
            ->leftJoin(DistrictRepository::TABLE_NAME, self::TABLE_NAME . '.district_id', '=', DistrictRepository::TABLE_NAME . '.id')
            ->leftJoin(EmployDescriptionRepository::TABLE_NAME, self::TABLE_NAME . '.employee_description_id', '=', EmployDescriptionRepository::TABLE_NAME . '.id')
            ->leftJoin('employers','employers.id', '=', self::TABLE_NAME.'.employer_id')
            ->join( TagRepository::TABLE_NAME, self::TABLE_NAME.'.id', '=', TagRepository::TABLE_NAME.'.job_id')
            ->where(function ($query) use ($jobId) {
                $query->where(self::TABLE_NAME . '.id', $jobId);
                $query->orWhere(self::TABLE_NAME.'.slug', $jobId);
            })
            ->where(self::TABLE_NAME . '.is_show', self::JOB_SHOW)
            ->where(self::TABLE_NAME . '.is_public', self::JOB_PUBLIC)
            ->select(
                CompanyRepository::TABLE_NAME . '.logo',
                CompanyRepository::TABLE_NAME . '.name as name_company',
                CompanyRepository::TABLE_NAME . '.short_name as short_name_company',
                CompanyRepository::TABLE_NAME . '.website as website_company',
                CompanyRepository::TABLE_NAME . '.address as workplace_detail_company',
                CompanyRepository::TABLE_NAME . '.workplace as province_company',
                CompanyRepository::TABLE_NAME . '.district as district_company',
                self::TABLE_NAME . '.id',
                self::TABLE_NAME . '.title as title_job',
                self::TABLE_NAME . '.slug',
                self::TABLE_NAME . '.job_publish',
                self::TABLE_NAME . '.job_expire',
                self::TABLE_NAME . '.base_salary_min',
                self::TABLE_NAME . '.base_salary_max',
                self::TABLE_NAME . '.income_min',
                self::TABLE_NAME . '.income_max',
                self::TABLE_NAME . '.workplace_full_text as workplace_detail_job',
                self::TABLE_NAME . '.district_id as district_job',
                self::TABLE_NAME . '.province_id as province_job',
                self::TABLE_NAME . '.gender',
                self::TABLE_NAME . '.level_id as getRank', // xem helper
                self::TABLE_NAME . '.job_type',
                self::TABLE_NAME . '.type',
                self::TABLE_NAME . '.count_apply',
                self::TABLE_NAME . '.id as job_id',
                self::TABLE_FIELD_WORK . '.name as name_field_work',
                'employers.name as employer_name',
                'employers.email as employer_email',
                EmployDescriptionRepository::TABLE_NAME . '.degree',
                EmployDescriptionRepository::TABLE_NAME . '.experience',
                EmployDescriptionRepository::TABLE_NAME . '.appearance',
                JobDescriptionRepository::TABLE_NAME . '.description as description_job',
                JobDescriptionRepository::TABLE_NAME . '.requirements as requirements_job',
                JobDescriptionRepository::TABLE_NAME . '.benefit as benefit_job',
                TagRepository::TABLE_NAME.'.tag_id'
            )
            ->first();
        if(empty($detailJob)){
            return $detailJob;
        }

        $skillJob = DB::table(SkillRepository::TABLE_NAME)
            ->leftJoin(self::TABLE_SKILL_JOB, SkillRepository::TABLE_NAME . '.id', '=', self::TABLE_SKILL_JOB . '.skill_id')
            ->where(self::TABLE_SKILL_JOB . '.job_id', $jobId)
            ->get()
            ->toArray();
        if (!empty($skillJob)) {
            $detailJob->skillJob = $skillJob;
        }

        $characterJob = DB::table(CharacterRepository::TABLE_NAME)
            ->leftJoin(self::TABLE_CHARACTER_JOB, CharacterRepository::TABLE_NAME . '.id', '=', self::TABLE_CHARACTER_JOB . '.character_id')
            ->where(self::TABLE_CHARACTER_JOB . '.job_id', $jobId)
            ->get()
            ->toArray();
        if (!empty($characterJob)) {
            $detailJob->characterJob = $characterJob;
        }

        $companyBenefit = DB::table(self::TABLE_NAME)
            ->leftJoin(CompanyRepository::TABLE_NAME, self::TABLE_NAME . '.company_id', '=', CompanyRepository::TABLE_NAME . '.id')
            ->leftJoin(CompanyBenefitRepository::TABLE_NAME, CompanyRepository::TABLE_NAME . '.id', '=', CompanyBenefitRepository::TABLE_NAME . '.company_id')
            ->where(self::TABLE_NAME . '.id', $jobId)
            ->select(
                CompanyBenefitRepository::TABLE_NAME . '.name as name_benefit',
                CompanyBenefitRepository::TABLE_NAME . '.icon',
                CompanyBenefitRepository::TABLE_NAME . '.description as description_benefit'
            )
            ->get()
            ->toArray();
        if (!empty($companyBenefit)) {
            $detailJob->companyBenefit = $companyBenefit;
        }

        return $detailJob;
    }

    public function getJobDetailBySlug($slug)
    {
        dd($slug);
        $detailJob = DB::table(self::TABLE_NAME)
            ->leftJoin(JobDescriptionRepository::TABLE_NAME, self::TABLE_NAME . '.job_description_id', '=', JobDescriptionRepository::TABLE_NAME . '.id')
            ->leftJoin(ContactRepository::TABLE_NAME, self::TABLE_NAME . '.id', '=', ContactRepository::TABLE_NAME . '.job_id')
            ->leftJoin(CompanyRepository::TABLE_NAME, self::TABLE_NAME . '.company_id', '=', CompanyRepository::TABLE_NAME . '.id')
            ->leftJoin(self::TABLE_FIELD_WORK, self::TABLE_NAME . '.field_work_id', '=', self::TABLE_FIELD_WORK . '.id')
            ->leftJoin(ProvinceRepository::TABLE_NAME, self::TABLE_NAME . '.province_id', '=', ProvinceRepository::TABLE_NAME . '.id')
            ->leftJoin(DistrictRepository::TABLE_NAME, self::TABLE_NAME . '.district_id', '=', DistrictRepository::TABLE_NAME . '.id')
            ->leftJoin(EmployDescriptionRepository::TABLE_NAME, self::TABLE_NAME . '.employee_description_id', '=', EmployDescriptionRepository::TABLE_NAME . '.id')
            ->leftJoin('employers','employers.id', '=', self::TABLE_NAME.'.employer_id')
            ->join( TagRepository::TABLE_NAME, self::TABLE_NAME.'.id', '=', TagRepository::TABLE_NAME.'.job_id')
            ->where(self::TABLE_NAME . '.slug', $slug)
            ->where(self::TABLE_NAME . '.is_show', self::JOB_SHOW)
            ->where(self::TABLE_NAME . '.is_public', self::JOB_PUBLIC)
            ->select(
                CompanyRepository::TABLE_NAME . '.logo',
                CompanyRepository::TABLE_NAME . '.name as name_company',
                CompanyRepository::TABLE_NAME . '.short_name as short_name_company',
                CompanyRepository::TABLE_NAME . '.website as website_company',
                CompanyRepository::TABLE_NAME . '.address as workplace_detail_company',
                CompanyRepository::TABLE_NAME . '.workplace as province_company',
                CompanyRepository::TABLE_NAME . '.district as district_company',
                self::TABLE_NAME . '.id',
                self::TABLE_NAME . '.title as title_job',
                self::TABLE_NAME . '.slug',
                self::TABLE_NAME . '.job_publish',
                self::TABLE_NAME . '.job_expire',
                self::TABLE_NAME . '.base_salary_min',
                self::TABLE_NAME . '.base_salary_max',
                self::TABLE_NAME . '.income_min',
                self::TABLE_NAME . '.income_max',
                self::TABLE_NAME . '.workplace_full_text as workplace_detail_job',
                self::TABLE_NAME . '.district_id as district_job',
                self::TABLE_NAME . '.province_id as province_job',
                self::TABLE_NAME . '.gender',
                self::TABLE_NAME . '.level_id as getRank', // xem helper
                self::TABLE_NAME . '.job_type',
                self::TABLE_NAME . '.type',
                self::TABLE_NAME . '.count_apply',
                self::TABLE_NAME . '.id as job_id',
                self::TABLE_FIELD_WORK . '.name as name_field_work',
                'employers.name as employer_name',
                'employers.email as employer_email',
                EmployDescriptionRepository::TABLE_NAME . '.degree',
                EmployDescriptionRepository::TABLE_NAME . '.experience',
                EmployDescriptionRepository::TABLE_NAME . '.appearance',
                JobDescriptionRepository::TABLE_NAME . '.description as description_job',
                JobDescriptionRepository::TABLE_NAME . '.requirements as requirements_job',
                JobDescriptionRepository::TABLE_NAME . '.benefit as benefit_job',
                TagRepository::TABLE_NAME.'.tag_id'
            )
            ->first();
        $skillJob = DB::table(SkillRepository::TABLE_NAME)
            ->leftJoin(self::TABLE_SKILL_JOB, SkillRepository::TABLE_NAME . '.id', '=', self::TABLE_SKILL_JOB . '.skill_id')
            ->where(self::TABLE_SKILL_JOB . '.job_id', $detailJob->id)
            ->get()
            ->toArray();
        if (!empty($skillJob)) {
            $detailJob->skillJob = $skillJob;
        }

        $characterJob = DB::table(CharacterRepository::TABLE_NAME)
            ->leftJoin(self::TABLE_CHARACTER_JOB, CharacterRepository::TABLE_NAME . '.id', '=', self::TABLE_CHARACTER_JOB . '.character_id')
            ->where(self::TABLE_CHARACTER_JOB . '.job_id', $detailJob->id)
            ->get()
            ->toArray();
        if (!empty($characterJob)) {
            $detailJob->characterJob = $characterJob;
        }

        $companyBenefit = DB::table(self::TABLE_NAME)
            ->leftJoin(CompanyRepository::TABLE_NAME, self::TABLE_NAME . '.company_id', '=', CompanyRepository::TABLE_NAME . '.id')
            ->leftJoin(CompanyBenefitRepository::TABLE_NAME, CompanyRepository::TABLE_NAME . '.id', '=', CompanyBenefitRepository::TABLE_NAME . '.company_id')
            ->where(self::TABLE_NAME . '.id', $detailJob->id)
            ->select(
                CompanyBenefitRepository::TABLE_NAME . '.name as name_benefit',
                CompanyBenefitRepository::TABLE_NAME . '.icon',
                CompanyBenefitRepository::TABLE_NAME . '.description as description_benefit'
            )
            ->get()
            ->toArray();
        if (!empty($companyBenefit)) {
            $detailJob->companyBenefit = $companyBenefit;
        }

        return $detailJob;
    }

    public function getJobByIdRaw($id)
    {
        return DB::table(self::TABLE_NAME)
            ->join(CompanyRepository::TABLE_NAME, CompanyRepository::TABLE_NAME.'.id', '=', self::TABLE_NAME.'.company_id')
            ->select(self::TABLE_NAME.'.id', self::TABLE_NAME.'.job_type', self::TABLE_NAME.'.title', CompanyRepository::TABLE_NAME.'.logo', CompanyRepository::TABLE_NAME.'.name')
            ->where(self::TABLE_NAME.'.id', $id)
            ->first()
        ;
    }

    public function searchJobByName($name)
    {
        return DB::table(self::TABLE_NAME)
            ->where('job_name', 'like', '%' . $name . '%')
            ->paginate(self::ITEM_OF_PAGE);
    }

    public function getIdCompanyBuJobId($jobId)
    {
        return DB::table(self::TABLE_NAME)
            ->Join(CompanyRepository::TABLE_NAME, self::TABLE_NAME . '.company_id', '=', CompanyRepository::TABLE_NAME . '.id')
            ->where(self::TABLE_NAME . '.id', $jobId)
            ->select(
                CompanyRepository::TABLE_NAME . '.id as company_id'
            )
            ->first();
    }

    public function getListJobSameCompany($companyId)
    {
        return DB::table(self::TABLE_NAME)
            ->join(CompanyRepository::TABLE_NAME, self::TABLE_NAME . '.company_id', '=', CompanyRepository::TABLE_NAME . '.id')
            ->where(self::TABLE_NAME . '.company_id', $companyId)
            ->where(self::TABLE_NAME . '.is_show', self::JOB_SHOW)
            ->where(self::TABLE_NAME . '.is_public',self::JOB_PUBLIC)
            ->select(
                self::TABLE_NAME . '.title as name_job',
                self::TABLE_NAME . '.income_min',
                self::TABLE_NAME . '.income_max',
                self::TABLE_NAME . '.income_max',
                self::TABLE_NAME . '.id as job_id',
                self::TABLE_NAME .'.job_expire',
                self::TABLE_NAME .'.job_type',
                CompanyRepository::TABLE_NAME . '.logo',
                CompanyRepository::TABLE_NAME . '.name as name_company'
            )
            ->limit(3)
            ->get();
    }

    public function getCountApply($jobId)
    {
        return DB::table(self::TABLE_NAME)
            ->Where(self::TABLE_NAME . '.id', $jobId)
            ->select(self::TABLE_NAME . '.count_apply')
            ->get();
    }

    public function recordNumberEmployeeApplyForJob($jobId, $countApplyBefore)
    {
        DB::table(self::TABLE_NAME)
            ->Where(self::TABLE_NAME . '.id', $jobId)
            ->update([
                "count_apply" => $countApplyBefore + 1,
                'updated_at' => date("Y/m/d H:i:s")
            ]);
    }

    public function getListJobIdByTagId($jobTag)
    {
      return  DB::table(TagRepository::TABLE_NAME)
            ->Where(TagRepository::TABLE_NAME . '.tag_id', $jobTag)
            ->get()
        ;
    }

    public function getListJobByListJobId($listJobId, $jobId)
    {
      return DB::table(self::TABLE_NAME)
            ->join(CompanyRepository::TABLE_NAME, 'company_id', '=', CompanyRepository::TABLE_NAME . '.id')
            ->join( TagRepository::TABLE_NAME, self::TABLE_NAME.'.id', '=', TagRepository::TABLE_NAME.'.job_id')
            ->whereIn(self::TABLE_NAME.'.id',$listJobId)
            ->where(self::TABLE_NAME.'.id','<>',$jobId)
          ->where(self::TABLE_NAME . '.is_show', self::JOB_SHOW)
          ->where(self::TABLE_NAME . '.is_public',self::JOB_PUBLIC)
            ->select(
                CompanyRepository::TABLE_NAME . '.logo',
                CompanyRepository::TABLE_NAME . '.short_name as short_name_company',
                self::TABLE_NAME . '.id',
                self::TABLE_NAME . '.title as title_job',
                self::TABLE_NAME . '.base_salary_min',
                self::TABLE_NAME . '.base_salary_max',
                self::TABLE_NAME . '.income_min',
                self::TABLE_NAME . '.income_max',
                self::TABLE_NAME . '.job_expire',
                self::TABLE_NAME . '.job_type'
            )
            ->limit(3)
            ->get()
            ;
    }
}
