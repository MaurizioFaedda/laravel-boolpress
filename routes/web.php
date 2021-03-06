<?php

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

Route::get('/', 'HomeController@index')->name('index');

Route::get('/posts', 'PostController@index')->name('posts.index');
Route::get('/posts/{slug}', 'PostController@show')->name('posts.show')
;
Route::get('/categories/{slug}', 'CategoryController@show')->name('categories.show');

Route::get('/tags/{slug}', 'TagController@show')->name('tags.show');

Route::get('/contacts', 'HomeController@contacts')->name('contacts');
Route::get('/thank-you', 'HomeController@thankYou')->name('contacts.thank-you');
Route::post('/contacts', 'HomeController@contactsSent')->name('contacts.sent');




Auth::routes(['register' => true]);


Route::middleware('auth')->namespace('Admin')->prefix('admin')->name('admin.')->group(function(){

    Route::get('/', 'HomeController@index')->name('index');
    Route::get('/profile', 'HomeController@profile')->name('profile');
    Route::resource('/posts', 'PostController');
    Route::resource('/categories', 'CategoryController');
    Route::resource('/tags', 'TagController');
    Route::post('/profile/generate-token', 'HomeController@generateToken')->name('generate_token');
});
