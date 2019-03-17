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
    return view('welcome');
});


Auth::routes();


Route::get('/home', 'HomeController@index')->name('home');

Route::resource('books', 'BooksController');
Route::resource('authors', 'AuthorsController');
Route::resource('subscriptions', 'SubscriptionsController');
Route::delete('books/subscriptions/books', 'SubscriptionsController@destroyFromUser');
Route::resource('users', 'UsersController');
Route::resource('comments', 'CommentsController');

Route::get('/{user}/books', 'UsersController@indexForSubscriber');
