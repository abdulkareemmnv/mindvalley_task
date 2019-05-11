<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Article extends Model
{
    protected $fillable = ['title','content'];

    public function tags(){
        return $this->belongsToMany(Tag::class,'article_tags');
    }

    public function photos(){
        return $this->hasMany(ArticlePhoto::class);
    }
}
