<?php

use App\Entity\{Rental, User};
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
})->name('index');

Route::group(['middleware' => 'auth'], function() {
    Route::resource('cars', "Resource\\ResourceCarController");
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');


Route::prefix('test')->group(function () {
    Route::get('all', function () {
        $data = Rental::all();
        return view('rental.all', ['data' => $data]);
    });
    Route::get('one/{id}', function ($id) {
        $data = Rental::find($id);
        return view('rental.one', ['rental' => $data]);
    });

    /*Route::get('failed/{id}', function ($car_id) {
        $rented = Rental::where('car_id', $car_id)->whereNull('returned_at')->first();
        return view('rental.failed', ['user' => $rented]);
    });*/
});
