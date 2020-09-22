<?php

use Illuminate\Database\Seeder;

class UpdateTimeTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // $this->call(UsersTableSeeder::class);
        DB::table( 'weatherUpdateTime' )->insert([ 'id' => 0 ]);

        DB::table( 'stationUpdateTime' )->insert([ 'id' => 0 ]);
    }
}
