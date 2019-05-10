<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Article extends Model
{
    use SoftDeletes;

    protected $fillable = [
        'category_id','title','author','markdown','body','description','keywords','cover','is_top','click_count'
    ];

    protected $dates = ['deleted_at'];

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function tags()
    {
        return $this->belongsToMany(Tag::class,'article_tags');
    }

    public function searchArticleGetId($keywords)
    {
        return self::where('title', 'like', "%$keywords%")
            ->orWhere('description', 'like', "%$keywords%")
            ->orWhere('markdown', 'like', "%$keywords%")
            ->pluck('id');
    }
}
