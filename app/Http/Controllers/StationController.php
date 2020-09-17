<?php

namespace App\Http\Controllers;

use Config;
use App\Crawler\StationCrawler;
use App\api\StationUpdateTime;
use App\api\Station;
use Illuminate\Http\Request;

class StationController extends Controller
{
    public function update()
    {
        $updateTime = StationUpdateTime::find(0);
        $pastUpdateTime = $updateTime->station;
        sscanf($pastUpdateTime, "%d-%d-%d %d:%d:%d", $y, $m,$d, $h, $i, $s );
        $pastUpdateTimeStamp = mktime( $h, $i, $s, $m, $d, $y );
        $currentTimeStamp = mktime(date("H")+8, date("i"), date("s"), date("m"), date("d"), date("Y"));
        $currentTime = date("Y-m-d H:i:s", $currentTimeStamp );
        // echo ($currentTimeStamp - $pastUpdateTimeStamp); use for debug
        if( ($currentTimeStamp - $pastUpdateTimeStamp) > 90*24*60*60 ) {
            $datasetIds = [ Config::get( "opendata.noManStationDatasetId"),
                                Config::get( "opendata.stationDatasetId") ];
            $crawler = new StationCrawler();

            foreach( $datasetIds as $datasetId ) {
                $dataset = $crawler->setUrl( Config::get( "opendata.url" ) )
                                ->setAuthCode(  Config::get( "opendata.auth") )
                                ->setDatasetId( $datasetId )
                                ->getData();
                foreach( $dataset as $data ) {
                    $station = Station::where( 'stationId', $data["stationId"] )->first(); 
                    if( $station == null  ) {
                        $station = new Station();
                    }

                    foreach( $data as $key => $value ) {
                        $station->$key = $value;
                    }
                    $station->save();
                }
            }

            $updateTime->station = $currentTime;
            $updateTime->save();
        }
    }
}
