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
