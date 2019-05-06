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


// 后台登录页面
Route::namespace('Admin')->prefix('admin')->group(function () {
    Route::redirect('/', url('admin/login/index'));
    Route::prefix('login')->group(function () {
        // 登录页面
        Route::get('index', 'LoginController@index')->middleware('admin.login');
        // 退出登陆
        Route::get('logout', 'LoginController@logout')->name('admin.logout');
    });


});

Route::namespace('Auth')->prefix('auth')->group(function () {
    Route::prefix('admin')->group(function () {
        // 登录认证
        Route::post('login', 'AdminController@login')->name('admin.login');
    });
});


//后台模块
Route::namespace('Admin')->prefix('admin')->middleware('admin.auth')->group(function (){

    Route::prefix('index')->group(function () {
        // 后台首页
        Route::get('index', 'IndexController@index');
    });

    //系统管理
    Route::prefix('auth')->group(function (){
        // 管理员列表
        Route::get('/users', 'AuthController@users')->name('admin.auth.users.index');
        Route::get('/users/create', 'AuthController@createUser')->name('admin.auth.users.create');
        Route::post('/users', 'AuthController@storeUser');
        Route::get('/users/{user}/edit', 'AuthController@editUser')->name('admin.auth.users.edit');
        Route::delete('/users/{user}', 'AuthController@destroyUser');
    });
});