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

use App\Http\Controllers\DashboardController;
use App\Http\Controllers\PostController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
});


Route::delete('dashboard/{email}', 'CommentController@unblock')->name('post.comment.unblock');
Route::resource('post', 'PostController');
Route::resource('post.comment', 'CommentController');
Route::resource('dashboard', 'DashboardController');
Route::get('/search', 'PostController@search');

Route::any('{any}', function () {
    return response()->view('errors.404', [], 404);
})->where('any', '.*');


