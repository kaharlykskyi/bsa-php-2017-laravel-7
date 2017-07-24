<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\DB;

class InsertTestData extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        DB::table('users')->insert([
            'first_name' => 'test',
            'last_name' => 'test',
            'email' => 'example@example.com',
            'password' => bcrypt('secret'),
            'is_active' => 1,
            'is_admin' => 0
        ]);

        DB::table('users')->insert([
            'first_name' => 'test',
            'last_name' => 'test',
            'email' => 'test@test.com',
            'password' => bcrypt('secret'),
            'is_active' => 1,
            'is_admin' => 1
        ]);

        DB::table('cars')->insert([
            'color' => 'blue',
            'model' => 'Tesla 1',
            'registration_number' => 'TLS123',
            'year' => rand(1950,2017),
            'mileage' => rand(0,100000),
            'price' => rand(100,1000),
            'user_id' => 1,
        ]);

        DB::table('cars')->insert([
            'color' => 'blue',
            'model' => 'Tesla 2',
            'registration_number' => 'TLS321',
            'year' => rand(1950,2017),
            'mileage' => rand(0,100000),
            'price' => rand(100,1000),
            'user_id' => 2,
        ]);

        DB::table('rentals')->insert([
            'car_id' => 1,
            'user_id' => 1,
            'price' => rand(100,10000),
            'rented_from' => 'Kyiv, 12b',
            'rented_at' => date("Y-m-d H:i:s")
        ]);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
}
