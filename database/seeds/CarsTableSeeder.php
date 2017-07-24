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
            'color' => str_random(6),
            'model' => str_random(6),
            'registration_number' => str_random(6),
            'year' => 2000,
            'mileage' => 100000,
            'price' => 1000,
            'user_id' => 1,
        ]);
    }
}
