<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Nav extends Model
{
    use SoftDeletes;

    protected $fillable = ['sort', 'name', 'url'];

    protected $dates = ['deleted_at'];
}
