<?php

use Illuminate\Database\Seeder;

class NavsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('navs')->insert([
            [
                'id' => 1,
                'name' => 'PHP',
                'sort' => 1,
                'url' => 'php',
                'created_at' => '2019-4-30 19:39:12',
                'updated_at' => '2019-4-30 16:39:12',
                'deleted_at' => null
            ],
            [
                'id' => 2,
                'name' => 'WEB前端',
                'sort' => 1,
                'url' => 'web',
                'created_at' => '2019-4-30 19:39:12',
                'updated_at' => '2019-4-30 16:39:12',
                'deleted_at' => null
            ],
            [
                'id' => 3,
                'name' => '数据库',
                'sort' => 1,
                'url' => 'mysql',
                'created_at' => '2019-4-30 19:39:12',
                'updated_at' => '2019-4-30 16:39:12',
                'deleted_at' => null
            ],
            [
                'id' => 4,
                'name' => '服务器',
                'sort' => 1,
                'url' => 'linux',
                'created_at' => '2019-4-30 19:39:12',
                'updated_at' => '2019-4-30 16:39:12',
                'deleted_at' => null
            ],
            [
                'id' => 5,
                'name' => '测试',
                'sort' => 1,
                'url' => 'test',
                'created_at' => '2019-4-30 19:39:12',
                'updated_at' => '2019-4-30 16:39:12',
                'deleted_at' => null
            ],
            [
                'id' => 6,
                'name' => 'BUG',
                'sort' => 1,
                'url' => 'bug',
                'created_at' => '2019-4-30 19:39:12',
                'updated_at' => '2019-4-30 16:39:12',
                'deleted_at' => null
            ]
        ]);
    }
}
