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




Route::get('/teste', function () {
    return view('pages.token');
});


Route::get('/crm', function () {
    return view('pages.suitecrm');
});



Route::get('/token', function () {
    return view('pages.token');
});

Route::post('/registration','RegistersController@registration');

//Route::post('/registo','UserRegisterController@create')->name('userRegister');

Auth::routes();

Route::get('/', 'HomeController@index')->name('home');
Route::get('/clientHome', 'clientController@index')->name('clientHome');
Route::get('/clientHome/exclusao', 'clientController@exclusao')->name('clienteExclusao');
