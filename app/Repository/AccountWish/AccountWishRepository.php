<?php
namespace App\Repository\AccountWish;

use App\Repository\Field\FieldJobRepository;
use Illuminate\Support\Facades\DB;

class AccountWishRepository
{
    const TABLE_NAME = 'account_wish';

    public function insertAndUpdate($dataRaw)
    {
        $dataInsert = [
            'account_id' => request()->user->id,
//            'filed_work_wish' => $dataRaw['filed_work_wish'],
//            'position_wish' => $dataRaw['position_wish'],
//            'salary_wish' => $dataRaw['salary_wish'],
//            'province_id' => $dataRaw['province_id'],
//            'district_id' => $dataRaw['district_id'],
//            'current_priority' => $dataRaw['current_priority'],
//            'job_type_wish' => $dataRaw['job_type_wish'],
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s')
        ];
        if(isset($dataRaw['filed_work_wish'])){
            $dataInsert['filed_work_wish'] = $dataRaw['filed_work_wish'];
        }
        if(isset($dataRaw['position_wish'])){
            $dataInsert['position_wish'] = $dataRaw['position_wish'];
        }

        if(isset($dataRaw['salary_wish'])){
            $dataInsert['salary_wish'] = $dataRaw['salary_wish'];
        }

        if(isset($dataRaw['province_id'])){
            $dataInsert['province_id'] = $dataRaw['province_id'];
        }

        if(isset($dataRaw['district_id'])){
            $dataInsert['district_id'] = $dataRaw['district_id'];
        }

        if(isset($dataRaw['current_priority'])){
            $dataInsert['current_priority'] = $dataRaw['current_priority'];
        }

        if(isset($dataRaw['job_type_wish'])){
            $dataInsert['job_type_wish'] = $dataRaw['job_type_wish'];
        }
        $check = DB::table(self::TABLE_NAME)
            ->where('account_id',request()->user->id)
            ->count();
        if($check==0){
            DB::table(self::TABLE_NAME)
                ->insert($dataInsert);
        }
        DB::table(self::TABLE_NAME)
            ->where('account_id',request()->user->id)
            ->update($dataInsert);
    }
    public function getDataAccountWish()
    {
        return DB::table(self::TABLE_NAME)
            ->where('account_id',request()->user->id)
            ->select(
                self::TABLE_NAME. '.account_id',
                self::TABLE_NAME. '.id',
                self::TABLE_NAME. '.position_wish',
                self::TABLE_NAME. '.salary_wish',
                self::TABLE_NAME. '.province_id',
                self::TABLE_NAME. '.district_id',
                self::TABLE_NAME. '.current_priority',
                self::TABLE_NAME. '.filed_work_wish',
                self::TABLE_NAME. '.job_type_wish'
            )
            ->first();
    }

}
