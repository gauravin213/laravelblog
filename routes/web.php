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


//lores.quickfix@gmail.com
//Peter@007

Route::get('/', function () {
    return view('home');
});

Auth::routes();


Route::get('/home', 'HomeController@index')->name('home');


Route::get('/admin', function () {
    return view('admin');
})->middleware('auth');


//Route::resource('blog','BlogController');

Route::resource('post','PostController');
Route::resource('category','CategoryController');
Route::resource('user','UserController');


Route::get('/page/about', 'PageController@getAbout')->name('about');
Route::get('/page/contact', 'PageController@getContact')->name('contact');

Route::get('/blog', 'BlogController@getIndex')->name('blog');
Route::get('blog/{slug}', ['as' => 'blog.single', 'uses' => 'BlogController@getSingle'])->where('slug', '[\w\d\-\_]+');

Route::get('blog/category/{slug}', ['as' => 'category.single', 'uses' => 'CategoryController@getSingle'])->where('slug', '[\w\d\-\_]+');