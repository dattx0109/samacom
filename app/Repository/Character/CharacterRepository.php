<?php


namespace App\Repository\Character;

use Illuminate\Support\Facades\DB;

class CharacterRepository
{
    const TABLE_NAME = 'character';

    public function getAllCharacter()
    {
        return DB::table(self::TABLE_NAME)
            ->pluck('name', 'id')
            ->toArray()
            ;
    }


}
