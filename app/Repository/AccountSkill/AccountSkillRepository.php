<?php

namespace App\Repository\AccountSkill;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Query\Builder;
use Illuminate\Support\Facades\DB;
use App\Repository\Skill\SkillRepository;

class AccountSkillRepository
{
    const TABLE_NAME = 'account_skill';

    /**
     * @param $dataInsert
     * @return int
     */
    public function insert($dataInsert)
    {

        return DB::table(self::TABLE_NAME)->insertGetId($dataInsert);
    }

    public function delete($id)
    {
        DB::table(self::TABLE_NAME)->where('id', $id)->where('account_id', request()->user->id)->delete();
    }

    public function getSkill()
    {
        return DB::table(self::TABLE_NAME)
            ->join(SkillRepository::TABLE_NAME,self::TABLE_NAME.'.skill_id','=',SkillRepository::TABLE_NAME.'.id')
            ->where('account_id', request()->user->id)
            ->select('skill.*',self::TABLE_NAME.'.*')
            ->get();
    }

    public function getSkillByAccountSkillId($id)
    {
        return DB::table(self::TABLE_NAME)
            ->join(SkillRepository::TABLE_NAME,self::TABLE_NAME.'.skill_id','=',SkillRepository::TABLE_NAME.'.id')
            ->where(self::TABLE_NAME.'.account_id', request()->user->id)
            ->where(self::TABLE_NAME.'.id', $id)
            ->select(
                self::TABLE_NAME.'.id',
                self::TABLE_NAME.'.account_id',
                self::TABLE_NAME.'.skill_id',
                self::TABLE_NAME.'.point',
                SkillRepository::TABLE_NAME.'.name as name_skill'
                )
            ->first();
    }

    /**
     * @param $dataCheck
     * @param $id
     * @return bool
     */
    public function checkUniqueSkillAccount($dataCheck, $id)
    {
        $accountSkill =  DB::table(self::TABLE_NAME)
            ->where('skill_id', $dataCheck['skill_id'])
            ->where('account_id', request()->user->id);
        if(!empty($id)){
            $accountSkill = $accountSkill->where('id', $id);
        }
        $accountSkill= $accountSkill->exists();
        return $accountSkill;
    }

    /**
     * @param $id
     * @return Model|Builder|object|null
     */
    public function getDetailSkillAccount($id){
        return DB::table(self::TABLE_NAME)
            ->where('id',$id)
            ->where('account_id', request()->user->id)
            ->first();
    }

    /**
     * @param $id
     * @param $dataUpdate
     */
    public function updateAccountSkill($id, $dataUpdate)
    {
        DB::table(self::TABLE_NAME)
            ->where('id', $id)
            ->where('account_id', request()->user->id)
            ->update($dataUpdate);
    }

}
