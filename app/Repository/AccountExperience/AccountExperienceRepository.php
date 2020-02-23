<?php

namespace App\Repository\AccountExperience;

use Illuminate\Support\Facades\DB;
use App\Repository\Field\FieldJobRepository;

class AccountExperienceRepository
{
    const TABLE_NAME = 'account_experience';

    public function insert($dataCreate)
    {
     return   DB::table(self::TABLE_NAME)
         ->insertGetId($dataCreate);
    }

    public function delete($id)
    {
       return DB::table(self::TABLE_NAME)
            ->where('account_id',request()->user->id)
            ->where('id',$id)
            ->delete();
    }

    public function update($id, $rawData)
    {
        return DB::table(self::TABLE_NAME)
            ->where('account_id',request()->user->id)
            ->where('id',$id)
            ->update($rawData)
        ;
    }

    public function getDataAccountExpByAccountId()
    {
     return DB::table(self::TABLE_NAME)
            ->join(FieldJobRepository::TABLE_NAME, self::TABLE_NAME. '.field_work','=',FieldJobRepository::TABLE_NAME.'.id')
            ->where('account_id',request()->user->id)
            ->select(
                self::TABLE_NAME. '.account_id',
                self::TABLE_NAME. '.id',
                self::TABLE_NAME. '.start_time',
                self::TABLE_NAME. '.end_time',
                self::TABLE_NAME. '.company',
                self::TABLE_NAME. '.description',
                self::TABLE_NAME. '.position',
                FieldJobRepository::TABLE_NAME. '.name as field_work',
                FieldJobRepository::TABLE_NAME. '.id as field_work_id'
            )
            ->get();
    }

    public function getDataAccountExpByIdAccountExp($idAccountExp)
    {
        return DB::table(self::TABLE_NAME)
            ->leftJoin(FieldJobRepository::TABLE_NAME, self::TABLE_NAME. '.field_work','=',FieldJobRepository::TABLE_NAME.'.id')
            ->where(self::TABLE_NAME.'.id',$idAccountExp)
            ->where(self::TABLE_NAME.'.account_id',request()->user->id)
            ->select(
                self::TABLE_NAME. '.account_id',
                self::TABLE_NAME. '.id',
                self::TABLE_NAME. '.start_time',
                self::TABLE_NAME. '.end_time',
                self::TABLE_NAME. '.company',
                self::TABLE_NAME. '.description',
                self::TABLE_NAME. '.position',
                FieldJobRepository::TABLE_NAME. '.name as field_work'
            )
            ->first();
    }

    public function getDataAccountExpByIdAccountExpForUpdateExp($idAccountExp)
    {
        return DB::table(self::TABLE_NAME)
            ->where(self::TABLE_NAME.'.id',$idAccountExp)
            ->where(self::TABLE_NAME.'.account_id',request()->user->id)
            ->first();
    }
}
