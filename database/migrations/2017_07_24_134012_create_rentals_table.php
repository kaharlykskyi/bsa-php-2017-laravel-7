<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\DB;

class CreateRentalsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('rentals', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('car_id')->unsigned()->index();
            $table->integer('user_id')->unsigned()->index();
            $table->float('price', 8, 2)->default(1000);
            $table->string('rented_from')->nullable();
            $table->dateTime('rented_at')->nullable();
            $table->string('returned_to')->nullable();
            $table->dateTime('returned_at')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('rentals');
    }
}
