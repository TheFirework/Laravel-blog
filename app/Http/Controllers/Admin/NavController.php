<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\Nav\Store;
use App\Http\Requests\Nav\Update;
use App\Models\Nav;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use LaravelChen\MyFlash\MyFlash;

class NavController extends Controller
{
    public function index()
    {
        $navs = Nav::orderBy('sort', 'desc')->get();
        return view('admin/nav/index', compact('navs'));
    }

    public function store(Store $request)
    {
        $data = $request->all();

        Nav::create($data);

        MyFlash::success('新增菜单');
        return redirect('admin/nav/index');
    }

    public function edit(Nav $nav)
    {
        return view('admin/nav/edit', compact('nav'));
    }

    public function update(Nav $nav, Update $request)
    {
        $data = $request->only([
            'name', 'url', 'sort'
        ]);

        $nav->update($data);

        MyFlash::success('菜单更新');

        return redirect('admin/nav/index');
    }

    public function destroy($id)
    {
        Nav::destroy($id);

        MyFlash::success('菜单删除！');

        return response()->json([
            'code' => 100,
            'msg' => '删除成功',
        ]);
    }
}
