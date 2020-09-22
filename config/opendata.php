<?php
return [
    "url" => env( 'OPENDATA_URL', 'https://opendata.cwb.gov.tw/api/v1/rest/datastore/'),
    "auth" => env( 'OPENDATA_AUTH', 'CWB-F600B430-4562-4DF4-BE65-CCBC059A1AA7'),
    "weekDatasetId" => env( 'OPENDATA_WEEK_DATASETID', 'F-D0047-091'),
    "rainDatasetId" => env( 'OPENDATA_RAIN_DATASETID', 'O-A0002-001'),
    "stationDatasetId" => env( 'OPENDATA_STATION_DATASETID', 'C-B0074-001'),
    "noManStationDatasetId" => env( 'OPENDATA_NOMANSTATION_DATASETID', 'C-B0074-002')
];