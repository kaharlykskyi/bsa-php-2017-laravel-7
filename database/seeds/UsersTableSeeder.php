<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            'first_name' => str_random(6),
            'last_name' => str_random(6),
            'email' => str_random(10).'@gmail.com',
            'password' => bcrypt('secret'),
            'is_active' => 1,
            'is_admin' => 0
        ]);
    }
}
