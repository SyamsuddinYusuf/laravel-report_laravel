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

// Route::get('/', function () {
//     return view('welcome');
// });

use App\Container;
// use App\Container2;
// use Illuminate\Database\Eloquent\Model;


Route::group(['welcome'], function() {
    Route::get('', 'DatatablesController@index');
    Route::get('/cari','DatatablesController@cari');
    Route::get('/caribulan','DatatablesController@caribulan');

});

Route::group(['Detail_Container'], function() {
    Route::get('/detail_container', 'Detail_Container_Controller@index');
    Route::get('/detail_container/{id}', 'Detail_Container_Controller@detail');
});


Route::group(['pl'], function() {
    Route::get('/pl/{id}', 'PLController@index');
});

Route::group(['plbulan'], function() {
    Route::get('/plbulan/{bulan}', 'PLBulanController@index');
});

Route::group(['customer'], function() {
    Route::get('/customer', 'CustomerController@index');
});

Route::group(['sjm'], function() {
    Route::get('/sjm/{bulan}', 'SJMController@index');
});

Route::group(['kapal'], function() {
    Route::get('/kapal', 'KapalController@index');
});



Route::group(['slider'], function() {
    Route::get('/slider', 'SliderController@index');
    Route::get('/slider2', 'Slider2Controller@index');
    Route::get('/slider3', 'Slider2Controller@index2');
});


//Route::get('/slider', 'SliderController@index');

Route::get('join-table', 'DatatablesController@index');

Route::get('/coba', 'CobaController@index');

Route::get('/container', 'JumlahContainerController@index');

// Route::get('/pl', 'JumlahPL@index');


Route::get('/jumlahpl', 'Controller@indexpl');

// Route::controller('datatables', 'DatatablesController', [
//     'anyData'  => 'datatables.data',
//     'getIndex' => 'datatables',
// ]);