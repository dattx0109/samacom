<?php

namespace App\Repository;

use Exception;
use Illuminate\Support\Facades\DB;

class JobContactRepository
{
    const TABLE_NAME = 'job_contact';

    public function insert($dataInsert)
    {
        $ids = [];
        foreach ($dataInsert as $item) {
            array_push($ids, $item['job_id']);
        }
        DB::table(self::TABLE_NAME)->whereIn('job_id', $ids)->delete();
        DB::table(self::TABLE_NAME)->insert($dataInsert);
    }

    public function update($dataInsert)
    {
        $ids = [];
        foreach ($dataInsert as $item) {
            array_push($ids, $item['job_id']);
        }
        DB::table(self::TABLE_NAME)->whereIn('job_id', $ids)->delete();

        DB::table(self::TABLE_NAME)->insert($dataInsert);
    }
}
