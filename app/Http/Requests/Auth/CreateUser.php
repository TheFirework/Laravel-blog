<?php

namespace App\Http\Requests\Auth;

use App\Http\Requests\Request;

class CreateUser extends Request
{
    public function rules()
    {
        return [
            'email' => 'required|email|max:255|unique:users',
            'name'  => 'required|string|max:255',
            'avatar' => 'mimes:jpeg,bmp,png,gif',
            'password' => 'required|confirmed|string|min:6',
            'password_confirmation' => 'required'
        ];
    }

    public function messages()
    {
        return [
            'avatar.mimes' =>'头像必须是 jpeg, bmp, png, gif 格式的图片',
        ];
    }

    public function attributes()
    {
        return [
            'email' => '邮箱',
            'name'  => '名称',
            'avatar'  => '头像',
            'password'  => '密码',
            'password_confirmation'  => '确认密码',
        ];
    }
}
