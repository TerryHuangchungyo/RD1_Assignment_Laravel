<?php

namespace App\Http\Controllers;

use App\api\Rain;
use App\api\Station;
use App\api\StationUpdateTime;
use App\Crawler\RainCrawler;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class RainController extends Controller
{
    public function rain( $cityName )
    {
        $data = Station::select( 'stations.*', 'rains.rain_1hr', 'rains.rain_24hr')
                ->join( 'rains', 'stations.stationId', '=', 'rains.stationId' )
                ->where( 'cityName', "=", $cityName )
                ->get();
        return response()->json( $data->toArray() )->setEncodingOptions(JSON_UNESCAPED_UNICODE);
    }

    public function rainAvg( $cityName ) 
    {
        $columns = [ 'rain_1hr', 'rain_24hr' ];
        foreach( $columns as $column ) 
        {
            $subQuery = DB::table("stations")
                            ->select( "rains.$column" )
                            ->join( 'rains', 'stations.stationId', '=', 'rains.stationId' )
                            ->where( 'cityName', '=', '?' );
            $query = DB::table( DB::raw("({$subQuery->toSql()}) as result"))
                    ->select(DB::raw("ROUND( AVG( result.$column ), 2 ) as $column"))
                    ->where( $column, '>=', '?' );
            $query->mergeBindings($subQuery);
            $data = DB::select($query->toSql(), [$cityName, 0.0])[0];
            $result[$column] = $data->$column;
        }
        

        return response()->json( [$result] )->setEncodingOptions(JSON_UNESCAPED_UNICODE);
    }

    public function update()
    {
        $updateTime = StationUpdateTime::find(0);
        $currentTimeStamp = mktime(date("H")+8, date("i"), date("s"), date("m"), date("d"), date("Y"));
        $currentTime = date("Y-m-d H:i:s", $currentTimeStamp );
        // echo ($currentTimeStamp - $pastUpdateTimeStamp); use for debug

        $crawler = new RainCrawler();
        $dataset = $crawler->setUrl( config( "opendata.url" ) )
                        ->setAuthCode( config( "opendata.auth" ) )
                        ->setDatasetId( config( "opendata.rainDatasetId" ) )
                        ->getData();

        if( $dataset ) {
            Rain::truncate();
            foreach( $dataset as $data ) {
                Rain::updateOrCreate( [ "stationId" => $data["stationId"] ],$data );
            }
            $updateTime->rain = $currentTime;
            $updateTime->save();
        }
        

        echo "rain [$currentTime]\n";
    }
}
