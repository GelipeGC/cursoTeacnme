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

/*Route::get('/', function () {
    return view('welcome');
});*/



Route::get('/', [
	'uses'	=> 'TicketsController@latest',
	'as'	=> 'tickets.latest'

	]);
Route::get('/populares', [
	'uses'	=> 'TicketsController@popular',
	'as'	=> 'tickets.popular'
	]);

Route::get('/pendientes', [
	'uses'	=> 'TicketsController@open',
	'as'	=> 'tickets.open'
	]);
Route::get('/tutoriales', [
	'uses'	=> 'TicketsController@closed',
	'as'	=> 'tickets.closed'
	]);
Route::get('/solicitud/{id}', [
	'uses'	=> 'TicketsController@details',
	'as'	=> 'tickets.details'
	]);
Route::resource('/estados', 'EstadosController');

Route::get('/municipios/{id}', 'EstadosController@getMunicipios');

Route::auth();

Route::group(['middleware' => 'auth'], function (){
Route::get('/solicitar', [
	'uses'	=> 'TicketsController@create',
	'as'	=> 'tickets.create'
	]);
Route::post('/solicitar', [
	'uses'	=> 'TicketsController@store',
	'as'	=> 'tickets.store'
	]);
//votar
Route::post('votar/{id}', [
	'uses'	=> 'VotesController@submit',
	'as'	=> 'votes.submit'
	]);
Route::delete('votar/{id}', [
	'uses'	=> 'VotesController@destroy',
	'as'	=> 'votes.destroy'
	]);


//commmets
Route::post('comentar/{id}', [
	'uses'	=> 'CommentsController@submit',
	'as'	=> 'comments.submit'
	]);
});
