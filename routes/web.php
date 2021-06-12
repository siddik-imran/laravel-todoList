<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

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

Route::get('/user', 'UserController@index');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

// User Avatar
Route::post('/upload', 'UserController@uploadAvatar');


// Todo List Mini Project

// Middleware
//Route::middleware('auth')->group(function(){
    // Route::get('/todos', 'TodoController@index')->name('todo.index');

    // Route::get('/todos/create', 'TodoController@create');
    // Route::post('/todos/create', 'TodoController@store');

    // Route::get('/todos/edit/{todo}', 'TodoController@edit');
    // Route::patch('/todos/update/{todo}', 'TodoController@update')->name('todo.update');

    // Route::delete('/todos/delete/{todo}', 'TodoController@delete')->name('todo.delete');

    //Resource Route
    Route::resource('/todo', 'TodoController');


    Route::put('/todos/complete/{todo}', 'TodoController@complete')->name('todo.complete');
    Route::put('/todos/incomplete/{todo}', 'TodoController@incomplete')->name('todo.incomplete');
//});
