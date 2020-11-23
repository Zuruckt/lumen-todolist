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

$router->group(['prefix' => 'users'], function () use ($router) {
    $router->post('/login', 'AuthController@login');
    $router->post('/logout', 'AuthController@logout');
    $router->post('/me', 'AuthController@me');
    $router->post('/refresh', 'AuthController@refresh');
    $router->post('/register', 'AuthController@register');
});



$router->group(['prefix' => 'items'], function () use ($router) {
    $router->get('/', 'ItemController@index');
    $router->post('/', 'ItemController@create');
});
