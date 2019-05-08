<?php

namespace App\Http\Requests\Nav;

use App\Http\Requests\Request;

class Store extends Request
{
    public function rules()
    {
        return [
            'name'  => 'required|string|max:255|unique:navs',
            'url'   => 'required|string|url|max:255',
            'sort'  => 'required|between:0,9999|integer'
        ];
    }

    public function messages()
    {
        return [
            'url.required' => '路径不能为空',
            'url.url' => '路径 格式不正确。',
            'url.max' => '路径最长255',
            'sort.required' => '路径不能为空',
            'sort.between' => '排序范围：0~9999',
            'sort.integer' => '排序必须是整数',
        ];
    }

    public function attributes()
    {
        return [
            'name' => '菜单名',
            'url'  => '路径',
            'sort'  => '排序',
        ];
    }
}
