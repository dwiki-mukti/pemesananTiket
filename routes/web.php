<?php

use Illuminate\Support\Facades\Route;

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

Auth::routes();


Route::group(['middleware' => ['auth', 'checkRole:admin']],function(){
	Route::resource('/transportasi', 'TransportasiController');
	Route::resource('/data_rute', 'RuteController');
	Route::put('ajax-request','RuteController@ajax');
	Route::get('/perjalanan/{key}', 'RuteController@perjalanan')->name('perjalanan');
	Route::get('/perjalanan/{key}/riwayat', 'RuteController@historyRute')->name('riwayatPerjalanan');
	Route::get('/sync', function () {
	    return redirect('/transportasi');
	});
	Route::post('/sync', 'RuteController@sync');
	Route::resource('/data_user','PenumpangController');
	Route::resource('/data_petugas','PetugasController');
});


// frontend

Route::group(['middleware' => ['auth', 'checkRole:user,admin']],function(){

	Route::get('/','FrontendController@index')->name('home');
	Route::get('/tiket/{tipe}','FrontendController@tiket')->name('tiket');
	Route::get('/milikmu','FrontendController@dibeli')->name('milikmu');
	Route::post('/milikmu','FrontendController@order');
	Route::get('/preview/{id}','FrontendController@preview')->name('preview');

});

Route::group(['middleware' => ['auth', 'checkRole:admin,petugas']],function(){

	Route::get('/checkin','PetugasController@checkin')->name('checkin');
	Route::post('/checkin','PetugasController@used');
	Route::get('/isisaldo','PetugasController@isisaldo')->name('isisaldo');
	Route::post('/isisaldo','PetugasController@findUser');
	Route::put('/isisaldo/{id}','PetugasController@TopUp');

});
