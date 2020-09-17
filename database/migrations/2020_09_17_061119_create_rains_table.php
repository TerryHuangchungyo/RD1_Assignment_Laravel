<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRainsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('rains', function( Blueprint $table ){
            $table->bigIncrements( 'rainId' );
            $table->string( 'stationId', 20 );
            $table->float( 'rain_1hr', 15, 4 );
            $table->float( 'rain_24hr', 15, 4 );
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('rains');
    }
}
