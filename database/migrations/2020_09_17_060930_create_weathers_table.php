<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateWeathersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create( 'weathers', function( Blueprint $table ) {
            $table->string( 'cityName', 15 );
            $table->dateTime( 'startTime' );
            $table->dateTime( 'endTime' );
            $table->string( 'minT', 5 )->nullable();
            $table->string( 'maxT', 5 )->nullable();
            $table->tinyInteger( 'weatherClass' )->nullable();
            $table->string( 'weatherCond', 30 )->nullable();
            $table->tinyInteger( 'comfortIdx' )->nullable();
            $table->string( 'rainProb', 5 )->nullable();
            $table->string( 'wind', 5 )->nullable();
            $table->primary(['cityName','startTime','endTime']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('weathers');
    }
}
