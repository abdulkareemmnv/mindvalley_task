<?php

use Illuminate\Database\Seeder;

class ArticleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(){
        $articles = factory(App\Article::class, 50)->create();

        foreach ($articles as $article){
            $tagsNum = rand(2,5);
            $tags = \App\Tag::orderByRaw('RAND()')->take($tagsNum)->get();
            foreach ($tags as $tag){
                \App\ArticleTag::create([
                    'article_id'    =>  $article->id,
                    'tag_id'        =>  $tag->id,
                ]);
            }

            $photosNum = rand(3,8);
            for ($i=0;$i<$photosNum;$i++){
                \App\ArticlePhoto::create([
                    'article_id'    =>  $article->id,
                    'photo'         =>  rand(1,150).'.jpg',
                ]);
            }
        }
    }

}
