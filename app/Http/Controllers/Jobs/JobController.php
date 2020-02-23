<?php


namespace App\Http\Controllers\Jobs;

use App\Http\Controllers\Controller;
use App\Service\Account\AccountService;
use App\Service\Candidate\CandidateService;
use App\Service\FieldJobService\FiledJobService;
use App\Service\Jobs\JobProcessService;
use App\Service\Jobs\JobService;
use App\Service\Province\ProvinceService;
use App\Service\District\DistrictService;
use App\Traits\SEOToolsTrait;
use http\Env\Request;

class JobController extends Controller
{
    use SEOToolsTrait;

    const URL_S3 = 'https://samacom.s3-ap-southeast-1.amazonaws.com/';
    private $jobService;
    private $jobProcessService;
    private $provinceService;
    private $districtService;
    private $accountService;
    private $candidateService;
    private $filedJobService;

    public function __construct(
        CandidateService $candidateService,
        JobService $jobService,
        JobProcessService $jobProcessService,
        ProvinceService $provinceService,
        DistrictService $districtService,
        AccountService $accountService,
        FiledJobService $filedJobService
    )
    {
        $this->candidateService = $candidateService;
        $this->jobService = $jobService;
        $this->jobProcessService = $jobProcessService;
        $this->provinceService = $provinceService;
        $this->districtService = $districtService;
        $this->accountService = $accountService;
        $this->filedJobService = $filedJobService;
    }

    public function index()
    {
        $fieldWorks = $this->filedJobService->getListField();
        return view('home.home', ['fieldWorks' => $fieldWorks]);
    }

    public function getListJobs()
    {
        $rawData      = request()->input();
        $listProvince = $this->jobService->getListProvince();
        $listJob      = $this->jobService->getListJob($rawData);
        $district     = $this->districtService->getList(request()->province_id);
        $fieldWorks = $this->filedJobService->getListField();
        foreach ($listJob as $item) {
            $item->logo = env('RICH_FILE_URL_BASE') . $item->logo;
        }

        $districtNames = $provinceNames = [];
        if(!empty($district)) {
            foreach ($district as $item) {
                $districtNames[$item->id] = $item->name;
            }
        }
        if(!empty($listProvince)) {
            foreach ($listProvince as $item) {
                $provinceNames[$item->id] = $item->name;
            }
        }

        return view('job.list-job', compact('listJob', 'listProvince', 'district', 'districtNames', 'provinceNames','fieldWorks'));
    }

    public function listDistrictByProvince()
    {
        $rawData = request()->input();
        $district = $this->jobService->getListDistrictByProvinceId($rawData['province_id']);
        return response()->json($district, 200);
    }

    public function getDetailJobBySlug($slug)
    {
        $jobDetail = $this->jobService->getJobDetailBySlug($slug);
        if (empty($jobDetail)) {
            return view('error.404');
        }
        $jobTag = (int)$jobDetail->tag_id;
        $listJobId = $this->jobService->getListJobIdByTagId($jobTag);
        $listJobSameJobDetail = $this->jobService->getListJobByListJobId($listJobId);
        $jobDetail->logo = env('RICH_FILE_URL_BASE') . $jobDetail->logo;
//        $listJobInCompany = $this->jobService->getListJobSameCompany($jobId);
        $provinces = $this->provinceService->getList();
        $districts = $this->districtService->getListDistrict();
        if (session('user') == null) {

            return view('job.job-detail', [
                'jobDetail' => $jobDetail,
//                'listJobInCompany' => $listJobInCompany,
                'provinces' => $provinces,
                'districts' => $districts,
                'listJobSameJobDetail' => $listJobSameJobDetail
            ]);
        }
        $userID = session('user')->id;
        $candidateID = $this->candidateService->getIdApplyJob($userID, $jobDetail->job_id);
        $percentageProfile = $this->accountService->percentageProfile();
        return view('job.job-detail', [
            'candidateID' => $candidateID,
            'jobDetail' => $jobDetail,
//            'listJobInCompany' => $listJobInCompany,
            'provinces' => $provinces,
            'districts' => $districts,
            'percentageProfile' => $percentageProfile,
            'listJobSameJobDetail' => $listJobSameJobDetail
        ]);
    }

    public function getDetailJobById($jobId)
    {
        $jobDetail = $this->jobService->getJobDetailByJobId($jobId);
        if (empty($jobDetail)) {
            return view('error.404');
        }
        $jobTag = (int)$jobDetail->tag_id;
        $listJobId = $this->jobService->getListJobIdByTagId($jobTag);
        $listJobSameJobDetail = $this->jobService->getListJobByListJobId($listJobId, $jobDetail->id);
        $jobDetail->logo = env('RICH_FILE_URL_BASE') . $jobDetail->logo;
//        $listJobInCompany = $this->jobService->getListJobSameCompany($jobId);
        $provinces = $this->provinceService->getList();
        $districts = $this->districtService->getListDistrict();
        if (session('user') == null) {
            $this->setSEOMetas([
                'title' => $jobDetail->title_job,
                'description' => 'Samacom - Cổng thông tin việc làm ngành Sales',
                'keywords' => 'Samacom,Tuyển dụng sale,Cổng thông tin việc làm ngành sale,sale jobs,việc làm sale',
                'image' => $jobDetail->logo,
                'canonical' => route('detail_job.id',$jobDetail->id)
            ]);
            return view('job.job-detail', [
                'jobDetail' => $jobDetail,
//                'listJobInCompany' => $listJobInCompany,
                'provinces' => $provinces,
                'districts' => $districts,
                'listJobSameJobDetail' => $listJobSameJobDetail
            ]);
        }
        $userID = session('user')->id;
        $candidateID = $this->candidateService->getIdApplyJob($userID, $jobDetail->job_id);
        $percentageProfile = $this->accountService->percentageProfile();

        $this->setSEOMetas([
            'title' => $jobDetail->title_job,
            'description' => 'Samacom - Cổng thông tin việc làm ngành Sales',
            'keywords' => 'Samacom,Tuyển dụng sale,Cổng thông tin việc làm ngành sale,sale jobs,việc làm sale',
            'image' => $jobDetail->logo,
            'canonical' => route('detail_job.id',$jobDetail->id)
        ]);

        return view('job.job-detail', [
            'candidateID' => $candidateID,
            'jobDetail' => $jobDetail,
//            'listJobInCompany' => $listJobInCompany,
            'provinces' => $provinces,
            'districts' => $districts,
            'percentageProfile' => $percentageProfile,
            'listJobSameJobDetail' => $listJobSameJobDetail
        ]);
    }

    public function getJobByIdApi($jobId)
    {
        $jobDetail = $this->jobService->getJobDetailApi($jobId);
        return response()->json($jobDetail, 200);
    }

    public function searchJob()
    {
        $name = \request('search');
        $dataSearch = $this->jobService->searchJob($name);
        return view('Jobs.search-jobs', ['dataSearch' => $dataSearch]);
    }
}
