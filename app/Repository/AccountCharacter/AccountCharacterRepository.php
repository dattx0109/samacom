<?php
namespace App\Repository\Account;

use App\Repository\Character\CharacterRepository;
use Illuminate\Support\Facades\DB;

class AccountCharacterRepository
{
    const TABLE_NAME = 'account_character';

    public function insert($dataInsert)
    {
        return DB::table(self::TABLE_NAME)
            ->insert($dataInsert);
    }

    public function getDataAccountCharacterByAccountId($id)
    {
        return DB::table(self::TABLE_NAME)
            ->leftJoin(CharacterRepository::TABLE_NAME,self::TABLE_NAME.'.character_id','=',CharacterRepository::TABLE_NAME.'.id')
            ->where(self::TABLE_NAME.'.account_id', request()->user->id)
            ->select(
                CharacterRepository::TABLE_NAME.'.name',
                self::TABLE_NAME.'.character_id as id'
            )
            ->get();
    }

    public function deleteAccountCharacter($id)
    {
        return DB::table(self::TABLE_NAME)
            ->where('id', $id)
            ->delete()
            ;
    }

    public function deleteAccountCharacterByAccountId($id)
    {
        return DB::table(self::TABLE_NAME)
            ->where('account_id', $id)
            ->delete()
            ;
    }
}
