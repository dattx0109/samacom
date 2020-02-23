<?php

namespace App\Repository\AccountVerify;

use Illuminate\Support\Facades\DB;

class AccountVerifyRepository
{
    const TABLE_NAME = 'account_verify';
    const TYPE_ACTIVE = '1';

    public function insert($dataRaw)
    {
        DB::table(self::TABLE_NAME)->insert($dataRaw);
    }
    public function info($accountId)
    {
      return  DB::table(self::TABLE_NAME)
          ->where('type',self::TYPE_ACTIVE)
          ->where('account_id',$accountId)
          ->select('expried_at','count_verify','code')
          ->orderByDesc('created_at')->first();
    }
    public function countCodeActiveOfDay()
    {
      return  DB::table(self::TABLE_NAME)
          ->where('type',self::TYPE_ACTIVE)
          ->where('account_id',request()->user->id)
          ->whereDate('created_at',date('Y-m-d'))
          ->count();
    }

    public function getCode($accountId)
    {
      return  DB::table(self::TABLE_NAME)
            ->where('account_id',$accountId)
            ->select('code')
            ->orderByDesc('created_at')
            ->first();
    }

    public function activeFail()
    {
        $accountVerify = DB::table(self::TABLE_NAME)
            ->where('account_id', request()->user->id)
            ->where('type', self::TYPE_ACTIVE)
            ->orderByDesc('created_at')
            ->first();
        DB::table(self::TABLE_NAME)->where('id', $accountVerify->id)->update([
            'count_verify' => $accountVerify->count_verify + 1,
            'updated_at' => date('Y-m-d')
        ]);
    }

}
