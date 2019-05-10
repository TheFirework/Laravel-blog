<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Article extends Model
{
    use SoftDeletes;

    protected $fillable = [
        'category_id','title','author','markdown','html','description','keywords','cover','is_top','click_count'
    ];

    protected $dates = ['deleted_at'];
}
