<?php

namespace App\Http\Controllers;

use App\Article;
use App\ArticlePhoto;
use App\ArticleTag;
use App\Tag;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Yajra\DataTables\Facades\DataTables;

class ArticleController extends Controller{

    public function __construct(){
        $this->middleware('auth');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(){
        return view('cms.articles.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(){
        $allTags = [];
        $tags = Tag::all();
        foreach ($tags as $tag)
            array_push($allTags,$tag->tag);

        $allTags = json_encode($allTags);

        return view ('cms.articles.create',compact('allTags'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request){
        $this->validate($request, [
            'title'         =>  'required',
            'content'       =>  'required',
            'photos'        =>  'required'
        ]);
        $article = Article::create($request->all());

        $tags = $request['taggles'];
        foreach ($tags as $tagVal){
            $tag = Tag::where('tag', '=', $tagVal);
            if ($tag->exists()) {
                $tagId = $tag->first()->id;
            }else{
                $tag = Tag::create(['tag'=>$tagVal]);
                $tagId = $tag->id;
            }
            ArticleTag::create(['article_id' => $article->id , 'tag_id' => $tagId]);
        }

        $photos = $request['photos'];
        foreach ($photos as $photo){
            ArticlePhoto::create(['article_id' => $article->id , 'photo' => $photo]);
        }


        return redirect('article');
    }


    public function uploadPhotos(Request $request){
        $photo = $request['photos'][0];
        $ext = $photo->extension();
        $imageName = 'article_img_'.time().rand(1,10000).'.'.$ext;
        $photo->storeAs('images',$imageName);
        return $imageName;
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Article  $article
     * @return \Illuminate\Http\Response
     */
    public function show(Article $article){
        return view('articles.show',compact('article'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Article  $article
     * @return \Illuminate\Http\Response
     */
    public function edit(Article $article){
        $articleTags = [];
        foreach ($article->tags()->get() as $tag)
            array_push($articleTags,$tag->tag);

        $articleTags = json_encode($articleTags);
		
		$articlePhotos = [];
        foreach ($article->photos()->get() as $photo)
            array_push($articlePhotos,url('storage/images/'.$photo->photo));

        $articlePhotos = json_encode($articlePhotos);

        $allTags = [];
        $tags = Tag::all();
        foreach ($tags as $tag)
            array_push($allTags,$tag->tag);

        $allTags = json_encode($allTags);

        return view('cms.articles.edit',compact('article','articleTags','articlePhotos','allTags'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Article  $article
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Article $article){
        $this->validate($request, [
            'title'         => 'required',
            'content'       => 'required'
        ]);
        $article->title = $request['title'];
        $article->content = $request['content'];
        $article->save();

        ArticleTag::where('article_id',$article->id)->delete();
        $tags = $request['taggles'];
        foreach ($tags as $tagVal){
            $tag = Tag::where('tag', '=', $tagVal);
            if ($tag->exists()) {
                $tagId = $tag->first()->id;
            }else{
                $tag = Tag::create(['tag'=>$tagVal]);
                $tagId = $tag->id;
            }
            ArticleTag::create(['article_id' => $article->id , 'tag_id' => $tagId]);
        }

        $photos = $request['photos'];
        foreach ($photos as $photo){
            ArticlePhoto::create(['article_id' => $article->id , 'photo' => $photo]);
        }

        return redirect('article');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Article  $article
     * @return \Illuminate\Http\Response
     */
    public function destroy(Article $article){
        ArticleTag::where('article_id',$article->id)->delete();
        ArticlePhoto::where('article_id',$article->id)->delete();
        $article->delete();
    }

    public function getDatatableArticles(){
        $articles = Article::all();
        return DataTables::of($articles)->make(true);
    }
}
