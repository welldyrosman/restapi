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
$router->post('/dokter','DokterController@create');
$router->get('/dokter','DokterController@index');
$router->get('/dokter/{id}','DokterController@getbyid');

$router->post('/patient','PatientController@create');
$router->get('/patient','PatientController@index');
$router->get('/patient/{id}','PatientController@getbyid');
$router->get('/test','PatientController@test');

$router->post('/register','UserController@create');
$router->post('/loginuser','UserController@login');
