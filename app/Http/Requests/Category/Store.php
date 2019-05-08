<?php

namespace App\Http\Requests\Category;

use App\Http\Requests\Request;

class Store extends Request
{
    public function rules()
    {
        return [
            'name'  => 'required|string|max:15|unique:category',
            'keywords'   => 'required|string|max:255',
            'description'   => 'required|string|max:255',
            'sort'  => 'required|between:0,9999|integer',
            'pid'  => 'required|between:0,9999|integer'
        ];
    }

    public function messages()
    {
        return [
            'sort.required' => '路径不能为空',
            'sort.between' => '排序范围：0~9999',
            'sort.integer' => '排序必须是整数',
        ];
    }

    public function attributes()
    {
        return [
            'name' => '菜单名',
            'keywords'  => '关键字',
            'sort'  => '排序',
            'description'  => '描述',
            'pid'  => '父级ID',
        ];
    }
}
