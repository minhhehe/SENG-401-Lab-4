<?php
use App\Http\Controllers\Controller;

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
    return view('layouts.welcome');
});


Auth::routes();


Route::get('/home', 'HomeController@index')->name('home')->middleware('auth');

Route::resource('books', 'BooksController')->middleware('auth');
Route::resource('authors', 'AuthorsController')->middleware('auth');
Route::resource('subscriptions', 'SubscriptionsController')->middleware('auth');
Route::delete('books/subscriptions/books', 'SubscriptionsController@destroyFromUser')->middleware('auth');
Route::resource('users', 'UsersController')->middleware('auth');
Route::resource('comments', 'CommentsController')->middleware('auth');

Route::get('/{user}/books', 'UsersController@indexForSubscriber')->middleware('auth');
