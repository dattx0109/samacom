<?php


namespace App\Http\Controllers\PlaceWork;




use App\Service\District\DistrictService;
use Illuminate\Http\Request;

class WorkPlaceController
{
    private $districtService;

    public function __construct(DistrictService $districtService)
    {
        $this->districtService = $districtService;
    }

    public function getListDistrictByProvince(Request $request)
    {
        $district = $this->districtService->getListDistrictsByProvinceId($request->province_id);
        return response()->json($district, 200);
    }
}
