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

Route::get('/', function () {
    return view('welcome');
})->name('default_login_admin');




Route::group(['prefix' => 'Admin'], function () {
    Route::get("/", 'Admin\LoginController@index')->name('Login_Admin');
    Route::get("/home", "Admin\DashboardController@index")->name('Dashboard_Home_Admin')->middleware('Check_Admin_Login');
    Route::get("/logout", 'Admin\LoginController@logout')->middleware('Check_Admin_Login');
    Route::post("/login", 'Admin\LoginController@login');
    Route::post("/register", 'Admin\LoginController@register_user');

    Route::get("new-post/{slug}", "Admin\DashboardController@add")->name('Create_News_Admin');
    Route::get("edit/{slug}", "Admin\DashboardController@edit")->name('Edit_News_Admin');
});