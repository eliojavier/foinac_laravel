<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::group(['middleware' => 'auth'], function () {
    Route::resource('acciones', 'AccionesController');
    Route::resource('prestamos', 'PrestamosController');
    Route::resource('pagos', 'PagosController');
    Route::resource('interesesbanco', 'InteresBancoController');
    Route::resource('comprasdivisas', 'ComprasDivisasController');
    Route::resource('ventasdivisas', 'VentasDivisasController');
    Route::resource('asientos', 'AsientosController');
    Route::resource('reportes', 'ReportesController');
    Route::resource('gastos', 'GastosController');
    Route::resource('ganancias', 'GananciasController');

    Route::get('asientos/excel', 'ExcelController@index');
});

Route::get('reportes/acciones', 'ReportesController@graficos');

Route::get('/', 'SiteController@index');
Route::get('home', 'SiteController@index');
Route::get('index', 'SiteController@index');

Route::get('admin', 'AdminController@index');

Route::controllers([
	'auth' => 'Auth\AuthController',
	'password' => 'Auth\PasswordController',
]);


