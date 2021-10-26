<?php

use Illuminate\Support\Facades\Auth;
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

// Route::get('/', function () {
//     return view('index');
// });

Route::get('/', 'App\Http\Controllers\TodoController@index')->name('index')->middleware('auth');
Route::get('index', 'App\Http\Controllers\TodoController@index')->name('index')->middleware('auth');
Route::get('create', 'App\Http\Controllers\TodoController@create')->name('create')->middleware('App\Http\Middleware\CheckRole');
Route::post('store', 'App\Http\Controllers\TodoController@store')->name('store')->middleware('App\Http\Middleware\CheckRole');
Route::get('edit/{todo}', 'App\Http\Controllers\TodoController@edit')->name('edit')->middleware('auth');
Route::put('update/{todo}', 'App\Http\Controllers\TodoController@update')->name('update')->middleware('auth');
Route::get('destroy/{todo}', 'App\Http\Controllers\TodoController@destroy')->name('destroy')->middleware('auth');
Route::get('show/{todo}', 'App\Http\Controllers\TodoController@show')->name('show')->middleware('auth');

Auth::routes();
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('403', function ()
{
    return view('layouts.403');
})->name('403');

Route::get('profile/edit/{id}', 'App\Http\Controllers\ProfileController@edit')->name('profile/edit')->middleware('App\Http\Middleware\CheckProfile');
Route::post('profile/update/{id}', 'App\Http\Controllers\ProfileController@update')->name('profile/update')->middleware('App\Http\Middleware\CheckProfile');
// Route::post('profile/show/{id}', 'App\Http\Controllers\ProfileController@show')->name('profile/show')->middleware('App\Http\Middleware\CheckProfile');

Route::get('profile/show/{id}', 'App\Http\Controllers\ProfileController@show')->name('profile/show')->middleware('App\Http\Middleware\CheckProfile');
Route::get('profile/my-todos/{id}', 'App\Http\Controllers\ProfileController@myTodos')->name('profile/myTodos')->middleware('App\Http\Middleware\CheckProfile');