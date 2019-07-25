<?php

use Illuminate\Http\Request;
use Illuminate\Routing\Router;

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

$router->group(['prefix' => 'api/v1'], function () use ($router) {
    $router->get('to-do',  ['uses' => 'toDoController@index']);

    $router->get('to-do/{id}', ['uses' => 'toDoController@show']);

    $router->post('to-do', ['uses' => 'toDoController@store']);

    $router->delete('to-do/{id}', ['uses' => 'toDoController@destroy']);

    $router->put('to-do/{id}', ['uses' => 'toDoController@update']);
});

$router->fallback(function(){
    return response()->json([
        'message' => 'Page Not Found. If error persists, contact jack at 3SC'], 404);
});
