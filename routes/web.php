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
});

Route::get("/Admin/Home", "Admin\DashboardController@index")->name('Dashboard_Home_Admin');;
Route::get("/Admin/", 'Admin\LoginController@index');
Route::post("/Admin/login", 'Admin\LoginController@login');
Route::post("/Admin/register", 'Admin\LoginController@register_user');
