<?php

namespace App\Repository\AccountEducation;

use Illuminate\Support\Facades\DB;

class AccountEducationRepository
{
    const TABLE_NAME = 'account_education';

    public function insert($dataInsert)
    {
         return DB::table(self::TABLE_NAME)->insertGetId($dataInsert);
    }

    public function delete($id)
    {
       return DB::table(self::TABLE_NAME)->where('id', $id)->where('account_id', request()->user->id)->delete();
    }

    public function getAccountEdu()
    {
     return   DB::table(self::TABLE_NAME)
            ->where('account_id', request()->user->id)
            ->get();
    }

    public function getAccountEduId($id)
    {
        return DB::table(self::TABLE_NAME)
            ->where('id', $id)
            ->where('account_id', request()->user->id)
            ->first();
    }

    public function updateAccountEduId($rawDate,$id)
    {
        return DB::table(self::TABLE_NAME)
            ->where('id', $id)
            ->where('account_id', request()->user->id)
            ->update($rawDate);
    }
}
