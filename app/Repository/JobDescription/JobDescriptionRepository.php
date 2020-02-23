<?php

namespace App\Repository\JobDescription;

use Illuminate\Support\Facades\DB;

class JobDescriptionRepository
{
    const TABLE_NAME = 'job_description';

    public function insert($dataInsert)
    {
        return DB::table(self::TABLE_NAME)->insertGetId($dataInsert);
    }

    public function update($dataUpdate)
    {
        DB::table(self::TABLE_NAME)->where('id', $dataUpdate['id'])->update([
            "name" => $dataUpdate['name'],
            "updated_at" => $dataUpdate['updated_at'],
        ]);
    }
}
