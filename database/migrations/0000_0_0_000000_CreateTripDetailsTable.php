<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;


class CreateTripDetailsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        // 
        Schema::create('trip_details', function (Blueprint $table) {
            $table->bigIncrements('id');
            
            $table->bigInteger('trip_id');
            $table->string('date_from');
            $table->string('date_to');
            $table->string('price_singel');
            $table->string('price_group');
            $table->string('details');

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
        Schema::dropIfExists('trip_details');
    }
}