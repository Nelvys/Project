<?php

use Illuminate\Http\Request;
use App\Http\Controllers\MueblesController;
use App\Http\Controllers\MedioBasicoController;
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

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});


Route::group(['prefix' => 'v1'],function () {
    Route::post('authenticate', 'AuthController@authenticate');

    Route::group( ['middleware' => ['jwt.auth']], function () {
        /**
         * Obtener Todos los Permisos y Todos los Roles
         */
        Route::get('role/all', 'UserController@getAllRoles');
        Route::get('permission/all', 'UserController@getAllPermissions');
        /**
         * Gestion de Usuarios
         */
        Route::get('users', 'UserController@index');
        Route::get('users/{id}', 'UserController@show');
        Route::delete('user/delete/{id}', 'UserController@destroy');
        Route::post('user/create', 'UserController@create');
        Route::put('user/update/{id}', 'UserController@update');
        Route::get('user', 'AuthController@show');
        Route::get('token', 'AuthController@getToken');

         //ruta de muebles
        Route::resource('/muebles',MueblesController::class);
        //ruta medios basicos
        Route::resource('/medios-basicos',MedioBasicoController::class);



        Route::get('user', 'AuthController@user');
        Route::post('logout', 'AuthController@logout');












    });
});
Route::middleware('jwt.refresh')->get('/token/refresh', 'AuthController@refresh');

