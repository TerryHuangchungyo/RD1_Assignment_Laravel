<?php

namespace App\Http\Controllers;

use App\api\Weather;
use App\api\WeatherUpdateTime;
use App\Crawler\WeekWeatherCrawler;

use Illuminate\Http\Request;
use Illuminate\Http\Response;

class WeatherController extends Controller
{
    public function today( $cityName )
    {
        $currentDateTime = date("Y-m-d H:i:s",mktime(date("H")+8, date("i"), date("s"), date("m"), date("d"), date("Y")));

        $data = Weather::select( 'minT', 'maxT', 'weatherCond', 'weatherClass', 'comfortIdx', 'rainProb', 'wind')
                ->where('cityName', $cityName)
                ->orderBy( 'startTime' )
                ->first();

        return response()->json( [$data->toArray()] )->setEncodingOptions(JSON_UNESCAPED_UNICODE);
    }

    public function twoday( $cityName )
    {
        $currentDate = date("Y-m-d",mktime(date("H")+8, date("i"), date("s"), date("m"), date("d"), date("Y")));
        $tomorrow = date("Y-m-d",mktime(date("H")+8, date("i"), date("s"), date("m"), date("d")+1, date("Y")));
        $dayAfter = date("Y-m-d",mktime(date("H")+8, date("i"), date("s"), date("m"), date("d")+2, date("Y")));

        $data = Weather::select( 'minT', 'maxT', 'weatherCond', 'weatherClass', 'comfortIdx', 'rainProb', 'wind')
                ->where( 'cityName', $cityName )
                ->whereDate( 'startTime', '>=', $tomorrow )
                ->whereDate( 'startTime', '<=', $dayAfter )
                ->orderBy( 'startTime' )
                ->get();
        return response()->json( $data->toArray() )->setEncodingOptions(JSON_UNESCAPED_UNICODE);
    }

    public function week( $cityName )
    {
        $currentDate = date("Y-m-d",mktime(date("H")+8, date("i"), date("s"), date("m"), date("d"), date("Y")));
        $tomorrow = date("Y-m-d",mktime(date("H")+8, date("i"), date("s"), date("m"), date("d")+1, date("Y")));
        $sevenDayAfter = date("Y-m-d",mktime(date("H")+8, date("i"), date("s"), date("m"), date("d")+6, date("Y")));

        $data = Weather::select( 'startTime', 'endTime', 'minT', 'maxT', 'weatherCond', 'weatherClass', 'comfortIdx', 'rainProb', 'wind')
                ->where( 'cityName', $cityName )
                ->whereDate( 'startTime', '>=', $tomorrow )
                ->whereDate( 'startTime', '<=', $sevenDayAfter )
                ->orderBy( 'startTime' )
                ->get();
        return response()->json( $data->toArray() )->setEncodingOptions(JSON_UNESCAPED_UNICODE);
    }

    public function update() {
        $currentTimeStamp = mktime(date("H")+8, date("i"), date("s"), date("m"), date("d"), date("Y"));
        $currentTime = date("Y-m-d H:i:s", $currentTimeStamp );

        $crawler = new WeekWeatherCrawler();

        $crawler->setUrl( config( "opendata.url" ) );
        $crawler->setAuthCode( config( "opendata.auth" ) );
        $crawler->setDatasetId( config( "opendata.weekDatasetId" ) );
        $tomorrow = date("Y-m-d\TH:i:s",mktime(0, 0, 0, date("m"), date("d"), date("Y")));
        $afterday = date("Y-m-d\TH:i:s",mktime(0, 0, 0, date("m"), date("d")+7, date("Y")));
        $crawler->setFromDate( $tomorrow );
        $crawler->setToDate( $afterday );
        $crawler->setSort( "time" );
        $dataset = $crawler->getData();

        if( $dataset ) {
            Weather::truncate();

            foreach( $dataset as $data ) {
                Weather::updateOrCreate( [ 'cityName' => $data['cityName'], 'startTime' => $data['startTime'], 'endTime' => $data['endTime']], $data );
            }

            $updateTime = WeatherUpdateTime::find(0);
            $updateTime->weekWeather = $currentTime;
            $updateTime->save();
        }
        
        echo "weather [$currentTime]\n";
    }
}
