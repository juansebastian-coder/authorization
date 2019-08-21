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

Route::name('inicio')->get('/','Auth\LoginController@showLoginForm')->middleware('guest');
Route::get('/register', function () {
    return view('auth.register');
})->middleware('guest');

Route::post('login','Auth\LoginController@login')->name('login');
Route::post('logout','Auth\LoginController@logout')->name('logout');
Route::post('register','RegisterController@store')->name('regis');

Route::group(['middleware' => 'auth'], function () {
    Route::get('admin','Admin\AdminController@index')->middleware('user')->name('adminIndex');
Route::get('user','User\UserController@index')->middleware('admin')->name('userIndex');
Route::get('adminUser','User\AdministratorUserController@index')->middleware('user')->name('adminUserIndex');
Route::get('editUser/{user}','User\AdministratorUserController@edit')->middleware('user')->name('editU');

});




Route::post('create/hobby', 'HobbyController@store')->name('create_hobby');
Route::post('create/{user}/hobby', 'user\AdministratorUserController@store')->name('ucreate_hobby');
Route::post('edit', 'user\AdministratorUserController@update')->name('uedit_hobby');
Route::post('delete/{hobbby}/user/{user}', 'user\AdministratorUserController@destroy')->name('udelete_hobby');


