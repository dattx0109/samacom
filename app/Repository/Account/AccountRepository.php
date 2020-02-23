<?php

namespace App\Repository\Account;

use App\Repository\AccountDetail\AccountDetailRepository;
use App\Repository\AccountEducation\AccountEducationRepository;
use App\Repository\AccountExperience\AccountExperienceRepository;
use App\Repository\AccountSkill\AccountSkillRepository;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class AccountRepository
{
    const TABLE_NAME = 'accounts';

    public function checkAccountByPhoneOrEmail($dataCheck)
    {
        return DB::table(self::TABLE_NAME)
            ->where('phone', $dataCheck['phone'])
            ->first();
    }

    public function getAccountByPhone($phone)
    {
        return DB::table(self::TABLE_NAME)
            ->where('phone', $phone)
            ->first();
    }

    public function getAccountById($id)
    {
        return DB::table(self::TABLE_NAME)
            ->where('id', $id)
            ->first();
    }

    public function insertAccount($rawData)
    {
        return DB::table(self::TABLE_NAME)
            ->insert($rawData);
    }

    public function UpdateActiveAccount($accountId)
    {
        return DB::table(self::TABLE_NAME)
            ->where('id', $accountId)
            ->update([
                'is_active' => 1,
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s')
            ]);
    }

    public function changePassword($passwordNew, $accountId)
    {
        return DB::table(self::TABLE_NAME)
            ->where('id', $accountId)
            ->update([
                'password' => Hash::make($passwordNew),
            ]);
    }

    public function getAccount()
    {
        return DB::table(self::TABLE_NAME)
            ->get();
    }

    public function updateName($dataUpdate, $accountId)
    {
        return DB::table(self::TABLE_NAME)->where('id', $accountId)->update($dataUpdate);
    }

    public function percentageProfile()
    {
        $accountId = session('user')->id;
        $checkEdu = DB::table(AccountEducationRepository::TABLE_NAME)->where('account_id', $accountId)->exists();
        $checkExp = DB::table(AccountExperienceRepository::TABLE_NAME)->where('account_id', $accountId)->exists();
        $checkSkill = DB::table(AccountSkillRepository::TABLE_NAME)->where('account_id', $accountId)->exists();

        $account = DB::table(self::TABLE_NAME)
            ->leftJoin(AccountDetailRepository::TABLE_NAME, self::TABLE_NAME . '.id', '=',
                AccountDetailRepository::TABLE_NAME . '.account_id')
            ->where(self::TABLE_NAME . '.id', $accountId)
            ->first();

        $account->account_exp = $checkExp;
        $account->account_edu = $checkEdu;
        $account->account_skill = $checkSkill;

        return $account;
    }

}
