<?php

namespace App\Api;

use Illuminate\Database\Eloquent\Model;

class Station extends Model
{
    protected $table = 'stations';
    public $timestamps = false;
    protected $fillable = [ "stationId" ,"stationName", "stationAltitude", "longitude", "latitude", "cityName", "stationAddress" ];
}
