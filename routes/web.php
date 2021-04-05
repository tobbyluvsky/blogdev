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

Route::get('/', function () {
    return view('welcome');
});


Route::get('/', 'FrontendController@home')->name('homepage');
Route::get('/category/{slug}', 'FrontendController@category')->name('website.category');
Route::get('/post/{slug}', 'FrontendController@post')->name('website.post');


Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::group(['prefix' => 'admin', 'middleware' => ['auth']], function (){
    Route::get('/dashboard', function () {
        return view('admin.dashboard.index');
    });

    Route::resource('category','CategoryController');
    Route::resource('tag','TagController');
    Route::resource('post','PostController');
    Route::resource('user','UserController');
    Route::get('/profile','UserController@profile')->name('user.profile');
    Route::post('/profile_update','UserController@profileUpdate')->name('user.profile.update');

    Route::get('/settings','SettingController@edit')->name('setting.index');
    Route::post('/settings','SettingController@update')->name('setting.update');

});



