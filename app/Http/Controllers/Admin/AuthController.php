<?php

namespace App\Http\Controllers\Admin;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class AuthController extends Controller
{
    public function users()
    {
        $users = User::where('is_admin',1)->paginate(15);

        return view('admin.auth.users',compact('users'));
    }
}
