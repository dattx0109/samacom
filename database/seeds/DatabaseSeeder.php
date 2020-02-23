<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // $this->call(UsersTableSeeder::class);
         $this->call(CompaniesSeeder::class);
         $this->call(JobsSeeder::class);
         $this->call(JobDetailSeeder::class);
         $this->call(JobContactSeeder::class);
         $this->call(ProvinceSeeder::class);
    }
}
