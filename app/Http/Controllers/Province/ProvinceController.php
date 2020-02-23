<?php
namespace App\Http\Controllers\Province;

use App\Http\Controllers\Controller;
use App\Service\Province\GetListService;

class ProvinceController extends Controller
{
    private $getListService;

    public function __construct(GetListService $getListService)
    {
        $this->getListService = $getListService;
    }

    public function listProvince()
    {
        $rawData = $this->getListService->getAllProvinceAndDistricts();
        return response()->json($rawData);
    }
}