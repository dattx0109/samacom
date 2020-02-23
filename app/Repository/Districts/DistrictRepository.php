<?php


namespace App\Repository\Districts;


use Illuminate\Support\Facades\DB;

class DistrictRepository
{
    const TABLE_NAME = 'districts';

    public function getList($province_id)
    {
        $query = DB::table(self::TABLE_NAME);
       // if(!empty($province_id)) {
            $query->where('province_id', $province_id);
       // }
        $districts = $query->orderBy('name')->get();

        return $districts;
    }

    public function getListDistrict()
    {
        return DB::table(self::TABLE_NAME)
            ->get();
    }

    public function getListDistrictsByProvinceId($provinceId)
    {
        return DB::table(self::TABLE_NAME)
            ->where('province_id', $provinceId)
            ->get()
            ->toArray();
    }
}
