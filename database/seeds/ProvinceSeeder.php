<?php

use App\Exports\ProvinceExport;
use App\Service\Province\CreateService;
use Illuminate\Database\Seeder;

class ProvinceSeeder extends Seeder
{
    private $createService;

    public function __construct(CreateService $createService)
    {
        $this->createService = $createService;
    }
    public function run()
    {
        $province = new ProvinceExport;
        \Excel::import($province, public_path('listProvince.xls'));
        $dataInsert = $province->getProvince();
        $this->createService->insert($dataInsert);
    }
}
