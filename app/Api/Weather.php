<?php

namespace App\Api;

use Illuminate\Database\Eloquent\Model;

class Weather extends Model
{
    protected $table = 'weathers';
    public $timestamps = false;
    protected $fillable = [ "cityName" ,"startTime", "endTime", "minT", "maxT", "weatherClass", "weatherCond", "comfortIdx", "rainProb", "wind" ];
}
