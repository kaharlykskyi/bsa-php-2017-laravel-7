<?php

use Illuminate\Database\Seeder;
use \Illuminate\Support\Facades\DB;

class CarsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('cars')->insert([
            'color' => 'blue',
            'model' => str_random(6),
            'registration_number' => str_random(6),
            'year' => rand(1950,2017),
            'mileage' => rand(0,100000),
            'price' => rand(100,1000),
            'user_id' => 1,
        ]);
    }
}
