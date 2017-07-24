<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class RentalsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('rentals')->insert([
            'car_id' => rand(1,2),
            'user_id' => rand(1,3),
            'price' => rand(100,10000),
            'rented_from' => 'Kyiv, 12b',
            'rented_at' => date("Y-m-d H:i:s")
        ]);
    }
}
