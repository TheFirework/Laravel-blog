<?php

namespace App\Http\Requests\Tag;

use App\Http\Requests\Request;

class Update extends Request
{
    public function rules()
    {
        return [
            'name' => 'required|max:20|unique:tags,name,' . $this->route('tag')->id
        ];
    }

    public function messages()
    {
        return [
            'name.required' => '标签名不能为空',
            'name.max' => '标签名最长20',
            'name.unique' => '标签名已存在',
        ];
    }

    public function attributes()
    {
        return [
            'name' => '标签名',
        ];
    }
}
