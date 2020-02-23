<?php

namespace App\Http\Controllers\PlaceWork;

use App\Exports\ProvinceExport;
use App\Service\Province\CreateService;
use Maatwebsite\Excel\Facades\Excel;
use App\Http\Controllers\Controller;

class ExportFileExcelController extends Controller
{
    private $createService;

    public function __construct(CreateService $createService)
    {
        $this->createService = $createService;
    }

    public function export()
    {
        $province = new ProvinceExport;
        \Excel::import($province, public_path('listProvince.xls'));
        $dataInsert = $province->getProvince();
        $this->createService->insert($dataInsert);
    }
}
