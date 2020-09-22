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
    Route::put('info', 'StationController@update');
});

Route::prefix('weather')->group( function(){
    Route::get('today/{cityName}', 'WeatherController@today');

    Route::get('twoday/{cityName}', 'WeatherController@twoday');

    Route::put( 'week', 'WeatherController@update');
    
    Route::get( 'week/{cityName}', 'WeatherController@week');

    Route::put('rain', 'RainController@update');

    Route::get('rain/{cityName}', 'RainController@rain');
    
    Route::get('rain/avg/{cityName}', 'RainController@rainAvg');
});
