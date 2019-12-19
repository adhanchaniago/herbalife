<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

//Route::middleware('auth:api')->get('/user', function (Request $request) {
//    return $request->user();
//});

//Route::get('brand', 'CatalogueController@index');

//Agregamos nuestra ruta al controller

//CUSTOM





Route::get('list_institutional', 'API_InstitutionalController@list');
Route::get('list_institutional_JSON', 'API_InstitutionalController@list_JSON');



Route::get('list_tipos', 'API_TiposController@list');

Route::get('list_productos', 'API_ProductosController@list');
Route::get('list_productos_JSON', 'API_ProductosController@list_JSON');

//WEB APP
Route::get('herbalife', 'APPController@institucional');


Route::get('productos', 'API\ProductsController@list')->name('productos');

///API Authentication


Route::group([
    'prefix' => 'auth'
], function () {

    Route::post('login', 'API\Auth\AuthController@login')->name('login');
    Route::post('register', 'API\Auth\AuthController@register');

    Route::group([
      'middleware' => 'auth:api'
    ], function() {
        
        Route::get('logout', 'API\Auth\AuthController@logout');
        Route::get('user', 'API\Auth\AuthController@user');
    });
});