<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEmployeeTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('employee', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('position');
            $table->string('role');
            $table->string('first_name');
            $table->string('last_name');
            $table->string('net');
            $table->string('brutto');
            $table->string('yearlynet');
            $table->string('yearlybrut');
            $table->string('socialcostmonth');
            $table->string('socialcostyear');
            $table->string('administrative');
            $table->string('expenses');
            $table->string('hardware');
            $table->string('othercosts');
            $table->string('companycostperyear');
            $table->string('companycostpermonth');
            
            $table->string('c1');
            $table->string('c2');
            $table->string('c3');
            $table->string('c4');
            $table->string('p1');
            $table->string('p2');
            $table->string('p3');
            $table->string('p4');
            $table->string('image');
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
        Schema::dropIfExists('employee');
    }
}
