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
//     return view('pages.home');
// });


Route::get('/login', function () {
    return view('auth.login');
});


Route::get('/crm', function () {
    return view('pages.suitecrm');
});

Route::get('/contactos', function () {
    return view('pages.contactos');
});

// Route::get('/home', function () {
//     return view('pages.home');
// });






Route::get('/token', function () {
    return view('pages.token');
});

Route::post('/registration','RegistersController@registration');

//Route::post('/registo','UserRegisterController@create')->name('userRegister');

Auth::routes();

/*Route::get('/', 'HomeController@Index')->name('home');*/

Route::get('/', function () {
    return view('pages.home');
});

Route::get('/clientHome', 'clientController@Index')->name('clientHome');

Route::get('/clientHome/Exclusao', 'clientController@Exclusao')->name('clienteExclusao');

Route::get('/clientHome/Remocao', 'clientController@Remocao')->name('clienteRemocao');

Route::post('/clientHome/AlterarDados', 'clientController@AlterarDados')->name('clienteAlterarDados');
