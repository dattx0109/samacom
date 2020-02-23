<?php

namespace App\Repository;

use Exception;
use Illuminate\Support\Facades\DB;

class CompanyRepository
{
    const TABLE_NAME = 'companies';
    const TABLE_COMPANY_DESCRIPTION = 'company_description';
    const TABLE_COMPANY_BENEFIT = 'company_benefit';

    public function insert($dataInsert)
    {
        $dataInsert['created_at'] = date('Y-m-d H:i:s');
        $dataInsert['updated_at'] = date('Y-m-d H:i:s');
        $dataInsert['company_description']['created_at'] = date('Y-m-d H:i:s');
        $dataInsert['company_description']['updated_at'] = date('Y-m-d H:i:s');
        //todo  insert to company description table
        $companyDescriptionId = DB::table(self::TABLE_COMPANY_DESCRIPTION)
            ->insertGetId($dataInsert['company_description']);
        $dataInsert['company_description_id'] = $companyDescriptionId;
        //todo  insert to company table
        $companyId = DB::table(self::TABLE_NAME)->insertGetId([
            "name" => $dataInsert['name'],
            "logo" => $dataInsert['logo'],
            "address" => $dataInsert['address'],
            "size_min" => $dataInsert['size_min'],
            "size_max" => $dataInsert['size_max'],
            "email" => $dataInsert['email'],
            "hotline" => $dataInsert['hotline'],
            "website" => $dataInsert['website'],
            "company_description_id" => $dataInsert['company_description_id'],
            "created_at" => $dataInsert['created_at'],
            "updated_at" => $dataInsert['updated_at']
        ]);
        $dataInsert['company_benefit'] = mergeDataCompanyBenefit($dataInsert['company_benefit'],$companyId);

        //todo  insert to company denefit table
        DB::table(self::TABLE_COMPANY_BENEFIT)
            ->insert($dataInsert['company_benefit'] );
        return $companyId;
    }

    public function update($dataUpdate)
    {
        $dataUpdate['updated_at'] = date('Y-m-d H:i:s');
        $dataUpdate['company_description']['updated_at'] = date('Y-m-d H:i:s');
        //todo update company
        DB::table(self::TABLE_NAME)
            ->where('id', $dataUpdate['id'])
            ->update([
                "name" => $dataUpdate['name'],
                "logo" => $dataUpdate['logo'],
                "address" => $dataUpdate['address'],
                "size_min" => $dataUpdate['size_min'],
                "size_max" => $dataUpdate['size_max'],
                "email" => $dataUpdate['email'],
                "hotline" => $dataUpdate['hotline'],
                "website" => $dataUpdate['website'],
                "updated_at" => $dataUpdate['updated_at']
            ]);
        //todo update company description
        DB::table(self::TABLE_COMPANY_DESCRIPTION)
            ->where('id', $dataUpdate['company_description_id'])
            ->update($dataUpdate['company_description']);
        //todo update company benefit
        $dataUpdate['company_benefit'] = mergeDataCompanyBenefit($dataUpdate['company_benefit'], $dataUpdate['id']);
        DB::table(self::TABLE_COMPANY_BENEFIT)
            ->where('company_id', $dataUpdate['id'])->delete();
        DB::table(self::TABLE_COMPANY_BENEFIT)
            ->insert($dataUpdate['company_benefit']);
    }

    public function checkCompany($name)
    {
        return DB::table(self::TABLE_NAME)->where('name', $name)->first();
    }
}
