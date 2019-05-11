<?php

namespace App\Http\Controllers;

use App\Article;
use Illuminate\Http\Request;

class IndexController extends Controller{

    public function index(){
        $articles = Article::paginate(15);
        return view('articles.index',compact('articles'));
    }
}
