<?php

use Illuminate\Database\Seeder;

class TagsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Db::table('tags')->insert([
            [
                'id'=>1,
                'name'=>'PHP',
                'article_count'=>1,
                'created_at' => '2019-4-30 19:39:12',
                'updated_at' => '2019-4-30 16:39:12',
                'deleted_at' => null
            ],
            [
                'id'=>2,
                'name'=>'Laravel',
                'article_count'=>1,
                'created_at' => '2019-4-30 19:39:12',
                'updated_at' => '2019-4-30 16:39:12',
                'deleted_at' => null
            ],
            [
                'id'=>3,
                'name'=>'JavaScript',
                'article_count'=>1,
                'created_at' => '2019-4-30 19:39:12',
                'updated_at' => '2019-4-30 16:39:12',
                'deleted_at' => null
            ],
            [
                'id'=>4,
                'name'=>'Linux',
                'article_count'=>1,
                'created_at' => '2019-4-30 19:39:12',
                'updated_at' => '2019-4-30 16:39:12',
                'deleted_at' => null
            ],
            [
                'id'=>5,
                'name'=>'Vue',
                'article_count'=>1,
                'created_at' => '2019-4-30 19:39:12',
                'updated_at' => '2019-4-30 16:39:12',
                'deleted_at' => null
            ],
        ]);
    }
}
