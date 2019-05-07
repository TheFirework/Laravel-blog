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
        return view('admin/index/dashboard');
    }

    public function login()
    {

    }
}
