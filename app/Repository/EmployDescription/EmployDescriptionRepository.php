<?php

namespace App\Repository\EmployDescription;

use Illuminate\Support\Facades\DB;

class EmployDescriptionRepository
{
    const TABLE_NAME = 'employee_description';

    public function insert($dataInsert)
    {
        return DB::table(self::TABLE_NAME)->insertGetId($dataInsert);
    }
    public function update($dataUpdate)
    {
        DB::table(self::TABLE_NAME)->where('id', $dataUpdate['id'])->update([
            "charecter" => $dataUpdate['charecter'],
            "skills" => $dataUpdate['skills'],
            "degree" => $dataUpdate['experience'],
            "experience" => $dataUpdate['experience'],
            "appearence" => $dataUpdate['appearence'],
            "voice" => $dataUpdate['voice'],
            "updated_at" => $dataUpdate['updated_at']
        ]);
    }
}
