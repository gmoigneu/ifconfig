<?php

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

// Limit rate to 15 per minute
$app->group(['middleware' => 'throttle:15,1'], function () use ($app) {
	$app->get('/', [
	    'as' => 'index', 'uses' => 'LookupController@index'
	]);

	$app->get('/json', [
	    'as' => 'index', 'uses' => 'LookupController@json'
	]);

	$app->get('/ip', [
	    'as' => 'index', 'uses' => 'LookupController@ip'
	]);

	$app->get('/city', [
	    'as' => 'index', 'uses' => 'LookupController@city'
	]);

	$app->get('/country', [
	    'as' => 'index', 'uses' => 'LookupController@country'
	]);

	$app->get('/port/{port}', [
	    'as' => 'index', 'uses' => 'PortController@index'
	]); 
});