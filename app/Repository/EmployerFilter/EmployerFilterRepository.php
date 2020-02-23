<?php

namespace App\Repository\EmployerFilter;

use Illuminate\Support\Facades\DB;

class EmployerFilterRepository
{
    const TABLE_NAME = 'employer_filter';

    public function store($account_id, $dataFilter)
    {
        DB::table(self::TABLE_NAME)->where('employer_id', $account_id)->delete();
        DB::table(self::TABLE_NAME)->insert([
            'employer_id' => $account_id,
            'filter' => json_encode($dataFilter),
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s')
        ]);

    }
}
