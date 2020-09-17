<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateStationUpdateTimeTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('stationUpdateTime', function( Blueprint $table ){
            $table->tinyInteger( 'id' );
            $table->dateTime('station' )->nullable()->default( '1970-01-01 00:00:01' );
            $table->dateTime( 'rain' )->nullable()->default( '1970-01-01 00:00:01' );
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('stationUpdateTime');
    }
}
