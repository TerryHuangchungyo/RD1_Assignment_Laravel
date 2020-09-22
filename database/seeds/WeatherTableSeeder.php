<?php

use Illuminate\Database\Seeder;
use App\Http\Controllers;

class WeatherTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $controllers = [ 'RainController', "StationController", "WeatherController" ];
        // foreach( $controllers as $controller ) 
        // {
        //     $controllerName = "Controllers\\$controller";
            
        //     $updator = new $controllerName;
        //     $updator->update();
        // }

        $updator = new Controllers\StationController;
        $updator->update();
        $updator = new Controllers\RainController;
        $updator->update();
        $updator = new Controllers\WeatherController;
        $updator->update();
    }
}
