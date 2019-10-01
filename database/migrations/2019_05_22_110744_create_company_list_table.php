<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCompanyListTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('company_list', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('company_name');
            $table->string('vacation_days');
            $table->string('sick_days');
            $table->string('working_days');
            $table->string('billability');
            $table->string('billability_year');
            $table->string('effective_days');
            $table->string('expected_profit');
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
        Schema::dropIfExists('company_list');
    }
}
