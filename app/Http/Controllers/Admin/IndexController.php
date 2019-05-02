<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use LaravelChen\MyFlash\MyFlash;

class IndexController extends Controller
{
    // 后台首页
    public function index()
    {
        MyFlash::success('欢迎回来!');

        return view('admin.index.index');
    }

    public function login()
    {

    }
}
