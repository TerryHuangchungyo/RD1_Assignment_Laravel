<?php

namespace App\Http\Controllers;

use App\Crawler\StationCrawler;
use App\api\StationUpdateTime;
use App\api\Station;
use Illuminate\Http\Request;

class StationController extends Controller
{
    public function update()
    {
        $updateTime = StationUpdateTime::find(0);
        $currentTimeStamp = mktime(date("H")+8, date("i"), date("s"), date("m"), date("d"), date("Y"));
        $currentTime = date("Y-m-d H:i:s", $currentTimeStamp );
        
        $datasetIds = [ config( "opendata.noManStationDatasetId"),
                            config( "opendata.stationDatasetId") ];
        $crawler = new StationCrawler();

        foreach( $datasetIds as $datasetId ) {
            $dataset = $crawler->setUrl( config( "opendata.url" ) )
                            ->setAuthCode(  config( "opendata.auth") )
                            ->setDatasetId( $datasetId )
                            ->getData();
            
            if( empty($dataset) ) {
                $failToUpdate = true;
                break;
            }

            foreach( $dataset as $data ) {
                Station::updateOrCreate( [ "stationId" => $data["stationId"] ],$data );
            }
        }

        if( !isset( $failToUpdate ) ) {
            $updateTime->station = $currentTime;
            $updateTime->save();
        }
        
        echo "station [$currentTime]\n";
    }
}
