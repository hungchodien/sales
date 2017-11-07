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

    Route::get("new-post/{slug}", "Admin\DashboardController@add")->name('Create_News_Admin')->middleware('Check_Admin_Login');
    Route::get("load/{slug}", "Admin\DashboardController@load")->name('Load_News_Admin');

    Route::post('Save/{slug}','Admin\DashboardController@save')->name('Save_News_Admin');
    Route::get('Edit/{slug}/{id}','Admin\DashboardController@edit')->name('Edit_News_Admin');
});
Route::group(['prefix' => 'Ajax'], function () {
    Route::get("/LoaiTinCuaTheLoai", 'Admin\TinTucController@LoaiTinCuaTheLoai')->name('Ajax_Load_LoaiTin_Theo_TheLoai');
    Route::get("/TheLoaiTheoLoaiTin", 'Admin\TinTucController@TheLoaiTheoLoaiTin')->name('Ajax_Load_TheLoai_Theo_LoaiTin');
    Route::post("/insertNewTag", 'Admin\TinTucController@insertNewTag')->name('Ajax_insertNewTag');
    Route::get('/Delete/{id}','Admin\TinTucController@Delete')->name('DeleteRecord');

    Route::post('/UpdateStatusOff','Admin\TinTucController@Update')->name('UpdateStatusOff');
});
