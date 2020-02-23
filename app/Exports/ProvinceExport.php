<?php

namespace App\Exports;

use App\Province;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\ToCollection;
use Illuminate\Support\Collection;
use App\Service;

class ProvinceExport implements ToCollection
{
    private $provinces;
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection(Collection $rows)
    {
      $this->provinces =$rows;


    }
    public function getProvince()
    {
       return $this->provinces;
    }

}
