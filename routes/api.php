<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::prefix('station')->group( function(){
    Route::put('/', function() {

    });
});

Route::prefix('weather')->group( function(){
    Route::get('today/{cityName}', function( $cityName ) {
        echo $cityName;
    });

    Route::get('twoday/{cityName}', function( $cityName ) {
        echo $cityName;
    });

    Route::get( 'week/{cityName}', function( $cityName ) {
        echo $cityName;
    });

    Route::put( 'week', function() {

    });

    Route::get('rainAvg/{cityName}', function( $cityName ) {
        echo $cityName;
    });

    Route::get('rain/{cityName}', function( $cityName ) {

    });

    Route::put('rain', function(){

    });
});
