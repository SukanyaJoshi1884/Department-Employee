<?php

/** @var \Laravel\Lumen\Routing\Router $router */

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It is a breeze. Simply tell Lumen the URIs it should respond to
| and give it the Closure to call when that URI is requested.
|
*/

$router->get('/', function () use ($router) {
    return $router->app->version();
});

$router->group(['prefix' => 'api'], function () use ($router) {
  $router->get('department',  ['uses' => 'DepartmentController@index']);

  $router->get('department/{id}', ['uses' => 'DepartmentController@show']);

  $router->post('department', ['uses' => 'DepartmentController@create']);

  $router->delete('department/{id}', ['uses' => 'DepartmentController@destroy']);

  $router->put('department/{id}', ['uses' => 'DepartmentController@update']);


  $router->get('employee',  ['uses' => 'EmployeeController@index']);

  $router->get('employee/{id}', ['uses' => 'EmployeeController@show']);

  $router->post('employee', ['uses' => 'EmployeeController@create']);

  $router->delete('employee/{id}', ['uses' => 'EmployeeController@destroy']);

  $router->put('employee/{id}', ['uses' => 'EmployeeController@update']);
});