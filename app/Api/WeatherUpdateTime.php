<?php

namespace App\Api;

use Illuminate\Database\Eloquent\Model;

class WeatherUpdateTime extends Model
{
    protected $table = 'weatherUpdateTime';
    public $timestamps = false;
    public $primaryKey = "cityName";
    public $incrementing = false;
}
