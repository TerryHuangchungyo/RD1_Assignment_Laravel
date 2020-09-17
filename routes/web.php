<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
use App\Api\StationUpdateTime;
use App\Crawler\StationCrawler;

Route::get('/', function () {
    return view('index');
});

Route::get('config', function(){
    $crawler = new StationCrawler();
    $dataset = $crawler->setUrl( Config::get( 'opendata.url') )
                    ->setAuthCode( Config::get( 'opendata.auth') )
                    ->setDatasetId( Config::get( 'opendata.stationDatasetId') )
                    ->getData();
    var_dump($dataset);
});

Route::get( 'test', 'StationController@update' );
