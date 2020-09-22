<?php

namespace App\Api;

use Illuminate\Database\Eloquent\Model;

class Rain extends Model
{
    protected $table = 'rains';
    public $timestamps = false;
    protected $fillable = [ "stationId", "rain_1hr", "rain_24hr" ];
}
