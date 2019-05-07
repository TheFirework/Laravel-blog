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
Route::namespace('Admin')->prefix('admin')->middleware('admin.auth')->group(function () {

    Route::prefix('index')->group(function () {
        // 后台首页
        Route::get('/index', 'IndexController@index')->name('admin.index.dashboard');
    });

    //系统管理
    Route::prefix('auth')->group(function () {
        // 管理员列表
        Route::get('/users', 'AuthController@users')->name('admin.auth.users.index');
        //新增管理员视图
        Route::get('/users/create', 'AuthController@createUser')->name('admin.auth.users.create');
        //创建管理员
        Route::post('/users', 'AuthController@storeUser')->name('admin.auth.users.store');
        //编辑管理员视图
        Route::get('/users/{user}/edit', 'AuthController@editUser')->name('admin.auth.users.edit');
        //更新管理员
        Route::patch('/users/{user}', 'AuthController@updateUser')->name('admin.auth.users.update');
        //删除管理员
        Route::delete('/users/{user}', 'AuthController@destroyUser')->name('admin.auth.users.delete');
    });

    //系统管理
    Route::prefix('nav')->group(function () {
        //菜单列表
        Route::get('/index', 'NavController@index')->name('admin.nav.index');
        //新增菜单
        Route::post('/store', 'NavController@store')->name('admin.nav.store');
        //编辑菜单视图
        Route::get('/{nav}/edit', 'NavController@edit')->name('admin.nav.edit');
        //更新菜单
        Route::patch('/{nav}', 'NavController@update')->name('admin.nav.update');
        //删除菜单
        Route::post('/destroy/{nav}', 'NavController@destroy')->name('admin.nav.destroy');
    });
});