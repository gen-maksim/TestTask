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


/*  get '/projects' index           show all
    get '/projects/1' show          show one
    get '/projects' create          form for creation
    post '/projects' store          save one
    get '/projects/1/edit' edit     form for edition
    patch 'projects/1' update       update one
    delete 'projects/1' destroy     delete one

*/

Route::get('/', 'UsersController@home')->name('home');
Route::get('/about', function (){
    return view('welcome');
});


Route::get('/projects', 'ProjectsController@index')->name('projects.index');
Route::get('/projects/refresh', 'ProjectsController@refresh')->name('projects.refresh');
Route::get('/projects/create', 'ProjectsController@create')->name('projects.create');
Route::get('/projects/{project}/edit', 'ProjectsController@edit')->name('projects.edit');
Route::get('projects/{project}', 'ProjectsController@show')->name('projects.show');
Route::patch('/projects/{project}', 'ProjectsController@update')->name('projects.update');
Route::delete('/projects/{project}', 'ProjectsController@destroy')->name('projects.destroy');
Route::post('/projects', 'ProjectsController@store')->name('projects.store');

Auth::routes();
