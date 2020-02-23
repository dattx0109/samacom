<?php


namespace App\Repository\User;


use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Query\Builder;
use Illuminate\Support\Facades\DB;
use App\Repository\AccountDetail\AccountDetailRepository;

class UserRepository
{
    const TABLE_NAME = 'accounts';
    const PASSWORD_DEFAULT ='samacom123456';
    /**
     * @param $email
     * @return Model|Builder|object|null
     */
    public function getUserByPhone($phone)
    {
        return DB::table(self::TABLE_NAME)
            ->leftJoin(AccountDetailRepository::TABLE_NAME, self::TABLE_NAME.'.id','=', AccountDetailRepository::TABLE_NAME.'.account_id')
            ->where(function ($query) use ($phone) {
                $query->where('phone', $phone);
                $query->orWhere('email', $phone);
            })
            ->select(
                self::TABLE_NAME.'.id',
                self::TABLE_NAME.'.name',
                self::TABLE_NAME.'.email',
                self::TABLE_NAME.'.phone',
                self::TABLE_NAME.'.is_active',
                self::TABLE_NAME.'.password',
                AccountDetailRepository::TABLE_NAME.'.avatar'
            )
            ->first();
    }

    public function findPhoneByPhone($phone)
    {
        return DB::table(self::TABLE_NAME)
            ->where('phone', $phone)
            ->count()
            ;
    }

    public function findEmailAfterRegister($email)
    {
        return DB::table(self::TABLE_NAME)
            ->where('email',$email)
            ->count()
            ;
    }

    public function findPhoneAfterRegister($phone)
    {
        return DB::table(self::TABLE_NAME)
            ->where('phone',$phone)
            ->count()
            ;
    }

    public function insertUser($rawData)
    {
         DB::table(self::TABLE_NAME)
            ->insertGetId($rawData);
         return  DB::table(self::TABLE_NAME)->where('phone',$rawData['phone'])->first();
    }

}
