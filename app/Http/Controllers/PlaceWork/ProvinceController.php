<?php
namespace App\Http\Controllers\PlaceWork;

use App\Service\Jobs\JobProcessService;
use App\Service\Province\GetListService;

class ProvinceController
{
    private $getListService;
    private $jobProcessService;
    public function __construct(GetListService $getListService, JobProcessService $jobProcessService)
    {
        $this->getListService = $getListService;
        $this->jobProcessService = $jobProcessService;
    }

    public function getList()
    {
      return  $this->getListService->getList();
    }
    public function test(){
        $logs = \File::get('/home/admin123/samacom/samacom/storage/logs/laravel-2019-08-2.log');
        $this->jobProcessService ->convertJob($logs);
    }


}
