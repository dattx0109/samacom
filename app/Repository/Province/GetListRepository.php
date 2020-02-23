<?php

namespace App\Repository\Province;

use Illuminate\Support\Facades\DB;

class GetListRepository
{
    const TABLE_NAME = 'provinces';
    const TABLE_NAME_DISTRICTS = 'districts';

    public function getList()
    {
        return DB::table(self::TABLE_NAME)->select('name', 'type')->get();
    }

    public function getListDataProvince()
    {
        return DB::table(self::TABLE_NAME)
            ->pluck('id', 'name')
        ;
    }

    public function getAllDataProvince()
    {
        return DB::table(self::TABLE_NAME)
            ->select(self::TABLE_NAME.'.id', self::TABLE_NAME.'.name as provinceName', self::TABLE_NAME_DISTRICTS.'.id as districtsId', self::TABLE_NAME_DISTRICTS.'.name')
            ->join(self::TABLE_NAME_DISTRICTS, self::TABLE_NAME_DISTRICTS.'.province_id', '=', self::TABLE_NAME.'.id')
            ->get()
        ;
    }
}
