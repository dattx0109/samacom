<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEmployyeDescriptionTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('employee_description', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->text('charecter')->nullable();
            $table->text('skills')->nullable();
            $table->text('degree')->nullable();
            $table->text('experience')->nullable();
            $table->text('appearence')->nullable();
            $table->text('voice')->nullable();
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
        Schema::dropIfExists('employee_description');
    }
}
