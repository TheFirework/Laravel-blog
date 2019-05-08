<?php

use Illuminate\Database\Seeder;

class CategoriesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('category')->insert([
            [
                'id'=>1,
                'name'=>'PHP',
                'keywords'=>'php',
                'description'=>'php相关',
                'sort'=>1,
                'pid'=>0,
                'created_at' => '2019-4-30 19:39:12',
                'updated_at' => '2019-4-30 16:39:12',
                'deleted_at' => null
            ],
            [
                'id'=>2,
                'name'=>'WEB',
                'keywords'=>'web前端',
                'description'=>'web前端相关',
                'sort'=>1,
                'pid'=>0,
                'created_at' => '2019-4-30 19:39:12',
                'updated_at' => '2019-4-30 16:39:12',
                'deleted_at' => null
            ],
            [
                'id'=>3,
                'name'=>'数据库',
                'keywords'=>'mysql',
                'description'=>'数据库相关',
                'sort'=>1,
                'pid'=>0,
                'created_at' => '2019-4-30 19:39:12',
                'updated_at' => '2019-4-30 16:39:12',
                'deleted_at' => null
            ],
        ]);
    }
}
