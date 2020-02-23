<?php


namespace App\Repository\Skill;


use Illuminate\Support\Facades\DB;

class SkillRepository
{
    const TABLE_NAME = 'skill';

    public function getAllSkill()
    {
        return DB::table(self::TABLE_NAME)
            ->pluck('name', 'id')
        ;
    }
}
