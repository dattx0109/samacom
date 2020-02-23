<?php
namespace App\Repository\PhoneVerifyRepository;

use Illuminate\Support\Facades\DB;

class PhoneVerifyRepository
{
    const TABLE_NAME = 'phone_verify';

    public function countSmsInDayByPhone($phone)
    {
        $dateNow = date("Y-m-d");
        $dateNowAfter1Day = date( "Y-m-d", strtotime( "$dateNow +1 day" ) );
        return DB::table(self::TABLE_NAME)
            ->whereBetween('created_at', [$dateNow, $dateNowAfter1Day])
            ->where('phone', $phone)
            ->count()
        ;
    }

    public function insertPhoneVerify($rawData)
    {
        return DB::table(self::TABLE_NAME)
            ->insert($rawData)
        ;
    }

    public function getCodeVerify($code, $phone)
    {
        return DB::table(self::TABLE_NAME)
            ->where('phone', $phone)
            ->where('code', $code)
            ->orderBy('id', 'DESC')
            ->first()
        ;
    }

    public function updateStatusVerify($id)
    {
        return DB::table(self::TABLE_NAME)
            ->where('id', $id)
            ->update(['status' => 1])
         ;
    }

}