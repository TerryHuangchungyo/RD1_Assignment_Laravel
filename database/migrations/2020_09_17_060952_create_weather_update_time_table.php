<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateWeatherUpdateTimeTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('weatherUpdateTime', function( Blueprint $table ){
            $table->string('cityName',15);
            $table->primary( 'cityName' ); 
            $table->dateTime( 'weekWeather' )->nullable()->default( '1970-01-01 00:00:01' );
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('weatherUpdateTime');
    }
}
