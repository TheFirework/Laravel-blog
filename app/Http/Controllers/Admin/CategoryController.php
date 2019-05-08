<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\Category\Store;
use App\Models\Category;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use LaravelChen\MyFlash\MyFlash;

class CategoryController extends Controller
{
    public function index()
    {
        $categories = Category::orderBy('sort','desc')->get();

        $categories = array_to_tree($categories->toArray());

        return view('admin/category/index',compact('categories'));
    }

    public function create()
    {
        $categories = Category::orderBy('sort')->get();

        $categories = array_to_tree($categories->toArray());

        return view('admin/category/create',compact('categories'));
    }

    public function store(Store $request)
    {
        $data = $request->all();

        Category::create($data);

        MyFlash::success('分类新增');

        return redirect('admin/category/index');
    }

    public function edit(Category $category)
    {
        $categories = Category::orderBy('sort')->get();

        $categories = array_to_tree($categories->toArray());

        array_unshift($categories,['id'=>0,'level'=>1,'pid'=>0,'name'=>'Root','_child'=>[]]);

        return view('admin/category/edit',compact('category','categories'));
    }

    public function update(Category $category,Request $request)
    {

    }

    public function destroy($id)
    {
        Category::destroy($id);
        MyFlash::success('分类删除！');

        return response()->json([
            'code' => 100,
            'msg' => '删除成功',
        ]);
    }
}
