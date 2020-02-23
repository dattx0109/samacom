<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateJobsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('jobs', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('crawler_job_id');
            $table->integer('company_id');
            $table->string('title');
            $table->string('income_min')->nullable();
            $table->string('income_max')->nullable();
            $table->string('base_salary_min')->nullable();
            $table->string('base_salary_max')->nullable();
            $table->integer('job_description_id');
            $table->integer('employee_description_id');
            $table->string('workplace');
            $table->string('sex');
            $table->integer('alowance_id')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('jobs');
    }
}
