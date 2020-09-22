<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class ModifyWeatherUpdateTimeTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('weatherUpdateTime', function (Blueprint $table) {
            $table->dropPrimary( 'cityName' );
            $table->dropColumn( 'cityName' );

            $table->tinyInteger( 'id' );
            $table->primary( 'id' ); 
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('weatherUpdateTime', function (Blueprint $table) {
            $table->dropPrimary( 'id' );
            $table->dropColumn('id');
        });
    }
}
