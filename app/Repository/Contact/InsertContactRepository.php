<?php

namespace App\Repository\Contact;

use Illuminate\Support\Facades\DB;

class InsertContactRepository
{
    const TABLE_NAME = 'contacts';

    public function insert($contacts, $jobId)
    {
        DB::table(self::TABLE_NAME)->where('job_id', $jobId)->delete();
        DB::table(self::TABLE_NAME)->insert(['user_name' => $contacts['user_name'],
            'job_id' =>  $jobId,
            'phone' =>  $contacts['phone'],
            'email' =>  $contacts['email'],]);
    }
}
