<?php

use App\Models\User;
use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
//        DB::table('users')->insert([
//            'name' => 'Fireworks',
//            'email' => 'jiangbo1994925@gmail.com',
//            'password' => bcrypt('secret'),
//            'avatar' => 'https://s.gravatar.com/avatar/1dd27bf2dc448589e6112a76162754e9?s=80',
//            'is_admin' => 1,
//            'created_at'    => '2019-4-30 19:39:12',
//            'updated_at'    => '2019-4-30 16:39:12',
//            'deleted_at'    => null,
//        ]);

        $users = factory(User::class)->times(50)->make();
        User::insert($users->makeVisible(['password', 'remember_token'])->toArray());

        $user = User::find(1);
        $user->name = 'Fireworks';
        $user->email = 'jiangbo1994925@gmail.com';
        $user->avatar = 'https://s.gravatar.com/avatar/1dd27bf2dc448589e6112a76162754e9?s=80';
        $user->is_admin = 1;
        $user->save();
    }
}
