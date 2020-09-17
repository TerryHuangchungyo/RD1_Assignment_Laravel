<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // $this->call(UsersTableSeeder::class);
        DB::table( 'weatherUpdateTime' )->insert([
            [ 'cityName' => '臺北市' ],
            [ 'cityName' => '新北市' ],
            [ 'cityName' => '基隆市' ],
            [ 'cityName' => '桃園市' ],
            [ 'cityName' => '新竹縣' ],
            [ 'cityName' => '新竹市' ],
            [ 'cityName' => '苗栗縣' ],
            [ 'cityName' => '臺中市' ],
            [ 'cityName' => '南投縣' ],
            [ 'cityName' => '彰化縣' ],
            [ 'cityName' => '雲林縣' ],
            [ 'cityName' => '嘉義縣' ],
            [ 'cityName' => '嘉義市' ],
            [ 'cityName' => '臺南市' ],
            [ 'cityName' => '高雄市' ],
            [ 'cityName' => '屏東縣' ],
            [ 'cityName' => '宜蘭縣' ],
            [ 'cityName' => '花蓮縣' ],
            [ 'cityName' => '臺東縣' ],
            [ 'cityName' => '澎湖縣' ],
            [ 'cityName' => '金門縣' ],
            [ 'cityName' => '連江縣' ]
        ]);

        DB::table( 'stationUpdateTime' )->insert([ 'id' => 0 ]);
    }
}
