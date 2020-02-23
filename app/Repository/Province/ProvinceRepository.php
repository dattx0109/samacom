<?php


namespace App\Repository\Province;


use Illuminate\Support\Facades\DB;

class ProvinceRepository
{
    const TABLE_NAME = 'provinces';

    public function getList()
    {
        return DB::table(self::TABLE_NAME)
            ->get();
    }
}
