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

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

$router->group(['prefix' => 'api'], function () use ($router) {
    $router->get('to-do',  ['uses' => 'TeamController@showAllTeamInformation']);

    $router->get('to-do/{id}', ['uses' => 'TeamController@showOneTeam']);

    $router->post('to-do', ['uses' => 'TeamController@createTeam']);

    $router->delete('to-do/{id}', ['uses' => 'TeamController@deleteTeam']);

    $router->put('to-do/{id}', ['uses' => 'TeamController@updateTeam']);
});

