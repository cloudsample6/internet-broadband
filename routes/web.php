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
    return view('login');
});

Route::post('/', 'LoginController@login')->name('login-post');

//route CRUD customer
Route::prefix('customer')->group(function () {
    Route::get('/','CustomerController@index')->name('customer-index');

    Route::get('/tambah','CustomerController@create');
    
    Route::post('/store','CustomerController@store')->name('customer-create');
    
    Route::get('/edit/{id}','CustomerController@edit');
    
    Route::post('/update','CustomerController@update');
    
    Route::get('/hapus/{id}','CustomerController@hapus');
    
    Route::get('/cari','CustomerController@cari');

});

Route::prefix('order')->group(function () {
    
Route::get('/','OrderController@index')->name('order-index');

});


Route::get('/registrasi/newcustomer/', function () {
    return view('auth.register');
})->name('registrasi');

Route::post('/registrasi/create/', 'CustomerController@store')->name('registrasi-create');

Route::delete('/registrasi/delete/{id}', 'UserController@destroy')->name('registrasi-destroy');


Auth::routes();

Route::get('/dashboard', 'HomeController@index')->name('dashbaord');

Route::get('/home/{id}', 'UserController@index')->name('asd');

Route::get('/home/{nama}/{umur}', 'MemberTypeController@index')->name('nmumur');

