<?php


namespace App\Repository\EmployerLandingPage;

use Illuminate\Support\Facades\DB;
use phpDocumentor\Reflection\Types\Self_;

class EmployerLandingPageRepository
{
    const TABLE_NAME = 'employer_landing_page';

    public function insert($rawData)
    {
        return DB::table(self::TABLE_NAME)
            ->insert($rawData);
    }
}
