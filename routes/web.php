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

// 前台路由
Route::namespace('Home')->group(function () {
    //首页
    Route::get('/','IndexController@index')->name('home.index.index');
    //文章分类列表
    Route::get('/category/{category}','CategoryController@index')->name('home.category.index');
    //文章标签列表
    Route::get('/tag/{tag}','TagController@index')->name('home.tag.index');
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
        Route::get('/index', 'IndexController@index')->name('admin.index.index');
        // 仪表盘
        Route::get('/dashboard', 'IndexController@dashboard')->name('admin.index.dashboard');
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
        //导航列表
        Route::get('/index', 'NavController@index')->name('admin.nav.index');
        //新增导航
        Route::post('/index', 'NavController@store')->name('admin.nav.index');
        //编辑导航视图
        Route::get('/{nav}/edit', 'NavController@edit')->name('admin.nav.edit');
        //更新导航
        Route::patch('/{nav}', 'NavController@update')->name('admin.nav.update');
        //删除导航
        Route::post('/destroy/{nav}', 'NavController@destroy')->name('admin.nav.destroy');
    });

    //分类管理
    Route::prefix('category')->group(function () {
        //分类列表
        Route::get('/index', 'CategoryController@index')->name('admin.category.index');
        //新增分类视图
        Route::get('/create', 'CategoryController@create')->name('admin.category.create');
        //新增分类
        Route::post('/', 'CategoryController@store')->name('admin.category.store');
        //编辑分类视图
        Route::get('/{category}/edit', 'CategoryController@edit')->name('admin.category.edit');
        //更新分类
        Route::patch('/{category}', 'CategoryController@update')->name('admin.category.update');
        //删除分类
        Route::delete('/{nav}', 'CategoryController@destroy')->name('admin.category.destroy');
    });

    //标签管理
    Route::prefix('tag')->group(function (){
       //标签列表
        Route::get('/index','TagController@index')->name('admin.tag.index');
        //新增标签视图
        Route::get('/create','TagController@create')->name('admin.tag.create');
        //新增标签
        Route::post('/','TagController@store')->name('admin.tag.store');
        //编辑标签视图
        Route::get('/{tag}/edit','TagController@edit')->name('admin.tag.edit');
        //更新标签
        Route::patch('/{tag}','TagController@update')->name('admin.tag.update');
        //删除分类
        Route::delete('/{tag}', 'TagController@destroy')->name('admin.tag.destroy');
    });

    //文章管理
    Route::prefix('article')->group(function (){
        //文章列表
        Route::get('/index','ArticleController@index')->name('admin.article.index');
        //文章新增视图
        Route::get('/create','ArticleController@create')->name('admin.article.create');
        //文章显示
        Route::get('/show/{article}','ArticleController@show')->name('admin.article.show');
        //新增文章
        Route::post('/index','ArticleController@store')->name('admin.article.store');
        //文章编辑视图
        Route::get('/{article}/edit','ArticleController@edit')->name('admin.article.edit');
        //文章更新
        Route::patch('/{article}','ArticleController@update')->name('admin.article.update');
        //文章删除
        Route::delete('/{article}', 'ArticleController@destroy')->name('admin.article.destroy');
        //文章上传图片
        Route::post('/uploadImage', 'ArticleController@uploadImage')->name('admin.article.uploadImage');
    });

});