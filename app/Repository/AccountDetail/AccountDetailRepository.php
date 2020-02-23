<?php

namespace App\Repository\AccountDetail;

use Illuminate\Support\Facades\DB;

class AccountDetailRepository
{
    const TABLE_NAME = 'account_detail';

    public function createAccountDetail($rawData)
    {
        return DB::table(self::TABLE_NAME)->insert($rawData);
    }

    public function findAccountDetailById($accountId)
    {
        return DB::table(self::TABLE_NAME)
            ->where('account_id', $accountId)
            ->count();
    }

    public function updateAccountDetailByIdAndRawData($accountId, $rawData)
    {
        return DB::table(self::TABLE_NAME)
            ->where('account_id', $accountId)
            ->update($rawData)
        ;
    }

    public function detail()
    {
      return  DB::table(self::TABLE_NAME)->where('account_id',request()->user->id)->first();
    }

    public function uploadAvatar($dataUpload)
    {
        $check = DB::table(self::TABLE_NAME)->where('account_id',request()->user->id)->count();
        if($check==0){
            DB::table(self::TABLE_NAME)->insert($dataUpload);
        }else{
            DB::table(self::TABLE_NAME)->where('account_id',request()->user->id)->update($dataUpload);
        }
    }
    public function uploadStatus($dataUpload)
    {
        $check = DB::table(self::TABLE_NAME)->where('account_id',request()->user->id)->count();
        if($check==0){
            DB::table(self::TABLE_NAME)->insert($dataUpload);
        }else{
            DB::table(self::TABLE_NAME)->where('account_id',request()->user->id)->update($dataUpload);
        }
    }
}
