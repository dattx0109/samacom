<?php

namespace App\Repository\Field;

use Illuminate\Support\Facades\DB;

class FieldJobRepository
{
    const TABLE_NAME = 'field_work';

    public function getAllField()
    {
        return DB::table(self::TABLE_NAME)
            ->pluck('name', 'id');
    }

    public function getListFieldWork()
    {
        return DB::table(self::TABLE_NAME)->orderBy('name')
            ->get();
    }
}
