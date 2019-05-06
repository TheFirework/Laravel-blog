<?php

namespace App\Http\Controllers\Admin;

use App\Handlers\ImageUploadHandler;
use App\Http\Requests\Auth\CreateUser;
use App\Models\User;
use http\Env\Response;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use LaravelChen\MyFlash\MyFlash;

class AuthController extends Controller
{
    public function users(Request $request)
    {
        $email = $request->email;
        $name = $request->name;
        $users = User::where('is_admin', 1)
            ->when($email, function ($query) use ($email) {
                return $query->where('email', $email);
            })
            ->when($name, function ($query) use ($name) {
                return $query->where('name', $name);
            })
            ->paginate(15);

        return view('admin.auth.users.index', compact('users'));
    }

    public function createUser()
    {
        return view('admin.auth.users.create');
    }

    public function storeUser(CreateUser $request,ImageUploadHandler $uploader)
    {
        $data = $request->all();

        $data['is_admin'] = 1;

        DB::beginTransaction();
        try{
            $user = User::create($data);
            if ($request->avatar) {
                $result = $uploader->save($request->avatar, 'avatars', $user->id);
                if ($result) {
                    $data['avatar'] = $result['path'];
                }
            }
            $user->update($data);
            DB::commit();
        }catch (\Exception $exception){
            DB::rollBack();
            return redirect()->back();
        }
        MyFlash::success('管理员已新增成功!');
        return redirect('admin/auth/users');
    }

    public function editUser(User $user)
    {
        return view('admin.auth.users.edit',compact('user'));
    }

    public function destroyUser($id)
    {
        User::destroy($id);

        return response()->json([
            'code' => '100',
            'msg' => '删除成功',
        ]);
    }


}
