<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateECrudsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('e_cruds', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('e_first_name');
            $table->string('e_last_name');
            $table->string('e_net');
            $table->string('e_brutto');
            $table->string('e_yearlybrut');
            $table->string('e_image');
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
        Schema::dropIfExists('e_cruds');
    }
}
