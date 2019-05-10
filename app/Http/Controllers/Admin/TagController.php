<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\Tag\Store;
use App\Http\Requests\Tag\Update;
use App\Models\Tag;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use LaravelChen\MyFlash\MyFlash;

class TagController extends Controller
{
    public function index(Request $request)
    {
        $id = $request->id;
        $name = $request->name;
       $tags = Tag::orderBy('article_count','desc')
           ->when($id, function ($query) use ($id) {
               return $query->where('id', $id);
           })
           ->when($name, function ($query) use ($name) {
               return $query->where('name', $name);
           })
           ->paginate(15);

        return view('admin/tag/index',compact('tags'));
    }

    public function create()
    {
        return view('admin/tag/create');
    }

    public function store(Store $request)
    {
        Tag::create($request->only('name'));

        MyFlash::success('标签创建');

        return redirect('admin/tag/index');
    }

    public function edit(Tag $tag)
    {
        return view('admin/tag/edit',compact('tag'));
    }

    public function update(Update $request,Tag $tag)
    {
        $tag->update($request->all());

        MyFlash::success('标签更新');

        return redirect('admin/tag/index');
    }

    public function destroy($id)
    {
        Tag::destroy($id);

        MyFlash::success('标签删除');

        return response()->json([
            'code' => 100,
            'msg' => '删除成功',
        ]);
    }
}
