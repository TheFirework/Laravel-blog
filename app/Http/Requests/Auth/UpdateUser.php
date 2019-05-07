<?php

namespace App\Http\Requests\Auth;

use App\Http\Requests\Request;
use Illuminate\Routing\Route;
use Illuminate\Support\Facades\Auth;

class UpdateUser extends Request
{

    public function rules()
    {
        return [
            'email' => 'required|email|max:255|unique:users,email,'.$this->route('user')->id,
            'name'  => 'required|string|max:255|regex:/^[A-Za-z0-9\-\_]+$/',
            'avatar' => 'mimes:jpeg,bmp,png,gif',
            'password' => 'required|confirmed|string|min:6',
            'password_confirmation' => 'required'
        ];
    }

    public function messages()
    {
        return [
            'avatar.mimes' =>'头像必须是 jpeg, bmp, png, gif 格式的图片',
            'name.regex' => '用户名只支持英文、数字、横杆和下划线。',
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
