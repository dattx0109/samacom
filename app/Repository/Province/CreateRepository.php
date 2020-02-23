<?php

namespace App\Repository\Province;

use Illuminate\Support\Facades\DB;

class CreateRepository
{
    const TABLE_NAME = 'provinces';

    public function insert($dataInsert)
    {
        try {
            DB::table(self::TABLE_NAME)->insert($dataInsert);
        } catch (\Exception $e) {
        }
    }


}


