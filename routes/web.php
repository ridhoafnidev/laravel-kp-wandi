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
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::group([ 'prefix' => 'admin', 'as' => 'admin.', 'middleware' => 'auth'], function(){

    Route::resource('users', 'UsersController');

    // Route::resource('users', 'UsersController@update');

    Route::resource('pelanggans', 'PelanggansController');

    Route::resource('jenisLokasi', 'JenisLokasiController');

    Route::resource('nsrProduk', 'nsrProdukController');

    Route::resource('nsrNonProduk', 'nsrNonProdukController');

    Route::resource('reklame', 'ReklameController');

    Route::resource('pembayaran', 'PembayaranController');
    
    Route::get('/downloadPDF/{id}','ReklameController@downloadPDF');

    // Route::get('profile','UsersController@profile')->name('profile');

	// Route::get('/profile/{id}','UsersController@profile');

});

Route::get('/profile','UsersController@profile')->name('profile');

Route::get('/profile2','UsersController@profile2')->name('profile2');

Route::put('/update2/{id}','UsersController@update2')->name('update2');

// Route::get('/profile/{id}/edit','UsersController@profile')->name('profile');

// Route::get('users/profile/{id}','UsersController@profile');

Route::get('/api/datatable/nsrNonProduk', 'nsrNonProdukController@dataTable')->name('api.datatable.nsrNonProduk');

Route::get('/api/datatable/nsrProduk', 'nsrProdukController@dataTable')->name('api.datatable.nsrProduk');

Route::get('/api/datatable/users', 'UsersController@dataTable')->name('api.datatable.users');

Route::get('/api/datatable/jenisLokasi', 'JenisLokasiController@dataTable')->name('api.datatable.jenisLokasi');

Route::get('/api/datatable/pelanggans', 'PelanggansController@dataTable')->name('api.datatable.pelanggans');

Route::get('/api/datatable/reklame', 'ReklameController@dataTable')->name('api.datatable.reklame');

Route::get('/api/datatable/pembayaran', 'PembayaranController@dataTable')->name('api.datatable.pembayaran');
