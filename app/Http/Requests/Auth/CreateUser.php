<?php

namespace App\Http\Requests\Auth;

use App\Http\Requests\Request;

class CreateUser extends Request
{

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'email' => 'required|email|max:255|unique:users',
            'name'  => 'required|string|max:255',
            'avatar' => 'required|file|image',
            'password' => 'required|confirmed|string|min:6',
            'password_confirmation' => 'required'
        ];
    }

    public function messages()
    {
        return [
            'avatar.required' => '头像不能为空',
            'avatar.image'  => '头像必须是图片',
        ];
    }
}
