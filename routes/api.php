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

$router->get('shorty', 'Api\Url\Controllers\ShortUrlController@create');
$router->get('{hash}', 'Api\Url\Controllers\ShortUrlController@read');
$router->get('', function () {
    return response()->json(['message' => 'Not Found!'], 404);
});
