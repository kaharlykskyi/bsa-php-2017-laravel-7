<?php

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
    Route::prefix('/cars/{id}')->group( function () {
        Route::get('rent', "Rental\\RentalController@show")->name('cars.rent');
        Route::post('rent/save', "Rental\\RentalController@save")->name('rent.save');
        Route::get('return', "Rental\\ReturnController@returnCar")->name('cars.return');
    });
    Route::prefix('/cars/api')->group( function () {
        Route::post('rent', "Rental\\Api\\RentalController@rent")->name('api.rent');
        Route::post('return', "Rental\\Api\\ReturnController@returnCar")->name('api.return');
    });
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
