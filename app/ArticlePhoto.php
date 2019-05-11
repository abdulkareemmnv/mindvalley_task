<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ArticlePhoto extends Model
{
    protected $fillable = ['article_id','photo'];
}
