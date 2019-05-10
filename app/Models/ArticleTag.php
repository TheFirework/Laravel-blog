<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ArticleTag extends Model
{
    protected $fillable = ['article_id','tag_id'];

    public function addTagIds($article_id, $tags)
    {
        // 组合批量插入的数据
        $data = [];
        foreach ($tags as $k => $v) {
            $data[] = [
                'article_id' => $article_id,
                'tag_id'     => $v,
            ];
        }
        $this->insert($data);
    }
}
