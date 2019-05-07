<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\Nav\Store;
use App\Models\Nav;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use LaravelChen\MyFlash\MyFlash;

class NavController extends Controller
{
    public function index()
    {
        $navs = Nav::withTrashed()->orderBy('sort', 'desc')->get();
        return view('admin/nav/index',compact('navs'));
    }

    public function store(Store $request)
    {
        $data = $request->all();

        Nav::create($data);

        MyFlash::success('新增菜单成功');
        return redirect('admin/nav/index');
    }

    public function edit(Nav $nav)
    {
        dd($nav->getAttributes());
        return view('admin/nav/edit');
    }

    public function destroy(Nav $nav)
    {
        dd($nav->getAttributes());
//        Nav::destroy($id);

        return response()->json([
            'code'=>100,
            'msg' => '删除成功',
        ]);
    }
}
