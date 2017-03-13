<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
Route::get('/', function () {
    return view('welcome');
});
Route::group(['prefix'=>'admin', 'middleware' => ['auth','admin'] ], function () {
	Route::get('home',['as'=>'admin.home', 'uses'=>'Admin\HomeController@home']);
	Route::group(['prefix'=>'system'], function () {
		Route::get('create',['as'=>'admin.system.create', 'uses'=>'Admin\SystemsController@create']);
		Route::post('store',['as'=>'admin.system.store', 'uses'=>'Admin\SystemsController@store']);
		Route::get('index',['as'=>'admin.system.index', 'uses'=>'Admin\SystemsController@index']);
		Route::get('destroy/{id}',['as'=>'admin.system.destroy', 'uses'=>'Admin\SystemsController@destroy']);
		Route::get('edit/{id}',['as'=>'admin.system.edit', 'uses'=>'Admin\SystemsController@edit']);
		Route::post('edit/{id}',['as'=>'admin.system.update', 'uses'=>'Admin\SystemsController@update']);
	});
	Route::group(['prefix'=>'game'], function () {
		Route::get('create',['as'=>'admin.game.create', 'uses'=>'Admin\GamesController@create']);
		Route::post('store',['as'=>'admin.game.store', 'uses'=>'Admin\GamesController@store']);
		Route::get('index',['as'=>'admin.game.index', 'uses'=>'Admin\GamesController@index']);
		Route::get('destroy/{id}',['as'=>'admin.game.destroy', 'uses'=>'Admin\GamesController@destroy']);
		Route::get('edit/{id}',['as'=>'admin.game.edit', 'uses'=>'Admin\GamesController@edit']);
		Route::post('edit/{id}',['as'=>'admin.game.update', 'uses'=>'Admin\GamesController@update']);
	});
	Route::group(['prefix'=>'category'], function () {
		Route::get('create',['as'=>'admin.category.create', 'uses'=>'Admin\CategoriesController@create']);
		Route::post('store',['as'=>'admin.category.store', 'uses'=>'Admin\CategoriesController@store']);
		Route::get('index',['as'=>'admin.category.index', 'uses'=>'Admin\CategoriesController@index']);
		Route::get('destroy/{id}',['as'=>'admin.category.destroy', 'uses'=>'Admin\CategoriesController@destroy']);
		Route::get('edit/{id}',['as'=>'admin.category.edit', 'uses'=>'Admin\CategoriesController@edit']);
		Route::post('edit/{id}',['as'=>'admin.category.update', 'uses'=>'Admin\CategoriesController@update']);
	});	
});
Auth::routes();

Route::get('/home', 'HomeController@index');
