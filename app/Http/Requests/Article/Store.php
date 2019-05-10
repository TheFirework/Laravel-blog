<?php

namespace App\Http\Requests\Article;

use App\Http\Requests\Request;

class Store extends Request
{
    public function rules()
    {
        return [
            'title'  => 'required|max:255|unique:articles',
            'author' => 'required|max:255',
            'cover'  => 'required|mimes:jpeg,bmp,png,gif',
            'category_id'  => 'required|integer',
            'tags'  => 'required',
            'is_top'  => 'required|integer',
            'keywords'  => 'required|max:255',
            'description'  => 'required|max:255',
            'markdown'  => 'required',
        ];
    }

    public function messages()
    {
        return [
            'title.required' => '标题不能为空',
            'title.max' => '标题最长25',
            'title.unique' => '标题已存在',
            'cover.mimes' =>'封面必须是 jpeg, bmp, png, gif 格式的图片',
        ];
    }

    public function attributes()
    {
        return [
            'title' => '标题',
            'author' => '作者',
            'cover' => '封面',
            'category_id' => '分类',
            'tags' => '标签',
            'is_top' => '置顶',
            'description' => '描述',
            'keywords' => '关键词',
            'markdown' => '内容',
        ];
    }
}
