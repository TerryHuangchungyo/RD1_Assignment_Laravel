<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateStationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('stations', function( Blueprint $table ){
            $table->string( 'stationId', 20 );
            $table->string('stationName', 20 );
            $table->float( 'stationAltitude', 8, 2 );
            $table->float( 'longitude', 8, 2 );
            $table->float( 'latitude', 8, 2 );
            $table->string( 'cityName', 10 );
            $table->string( 'stationAddress', 60 );
            $table->primary( 'stationId' );
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('stations');
    }
}
