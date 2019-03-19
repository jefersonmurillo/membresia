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
    return view('index');
});

Route::prefix('membresia')->group(function () {
    Route::get('registro', 'MiembroController@index')->name('membresia.registro');
    Route::post('registro', 'MiembroController@store')->name('membresia.store');
});

Route::get('p', function(){
    return view('welcome');
})->name('p');

Route::get('x', function(){
    return view('informes.registro');
});

Route::get('foto', 'PdfController@pdf');

Route::post('registro', 'MiembroController@store');
