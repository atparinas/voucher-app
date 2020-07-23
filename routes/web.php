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

//Auth::routes();
//

Route::get('/login/admins', 'Auth\LoginController@showAdminLogin')->name("show.admin.login");
Route::post('/login/admins',  'Auth\LoginController@adminLogin')->name('admin.login');

Route::get('login/users', 'Auth\LoginController@showUserLogin')->name('show.user.login');
Route::post('login/users', 'Auth\LoginController@userLogin')->name('show.user.login');

Route::get('register', 'Auth\RegisterController@showRegistrationForm')->name('show.register');
Route::post('register', 'Auth\RegisterController@register')->name('register');

Route::post('logout', 'Auth\LoginController@logout')->name('logout');


Route::get('/admins', 'Admin\AdminController@index');
Route::get('/users', 'User\UserController@index');

Route::get('/home', 'HomeController@index')->name('home');
