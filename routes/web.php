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

Route::get('/', 'IndexController@index')->name('index');

Route::prefix('membresia')->group(function () {
    Route::get('registro', 'MiembroController@index')->name('membresia.registro');
    Route::post('registro', 'MiembroController@store')->name('membresia.store');

    Route::get('miembro-pdf', 'MiembroController@obtenerMiembroPdf')->name('membresia.miembro-pdf');
    Route::get('libro', 'MiembroController@getLibroMiembros')->name('libro-miembros');

    Route::get('modificar', 'MiembroController@updateMiembro')->name('membresia.edit');
});

Route::get('p', function(){
    dd(\App\Models\Miembro::get(['id', ''])->toArray());
})->name('p');

Route::get('x', function(){
    dd(date('d/m/Y', strtotime('2019-03-27 19:04:40')));
});

Route::get('foto', 'PdfController@pdf');

Route::post('registro', 'MiembroController@store');
