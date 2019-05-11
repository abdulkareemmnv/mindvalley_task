@extends('layouts.master')

@section('title','Articles')

@section('content')

    @foreach($articles as $article)

        @if(($loop->iteration-1)%3==0)
            <div class="flex m-3">
        @endif
                <div class="w-1/3 m-3">
                    <div class="max-w-sm rounded overflow-hidden shadow-lg">
                        <img class="w-full" src="{{url('storage/images/'.$article->photos()->orderByRaw('RAND()')->first()->photo)}}" alt="article image">
                        <div class="px-6 py-4 bg-white h-48">
                            <div class="font-bold text-xl mb-2 "><a class="text-teal" style="text-decoration: initial;" href="{{url('article/'.$article->id)}}">{{$article->title}}</a></div>
                            <p class="text-grey-darker text-base">
                                @if (strlen($article->content) > 200)
                                    {!! substr(substr($article->content,0,200),0,strrpos($article->content,' '))!!} <a href="{{url('article/'.$article->id)}}" class="block mt-4 lg:inline-block lg:mt-0 text-teal hover:text-teal-darker mr-4">... read more</a>
                                @else
                                    {!! $article->content !!}
                                @endif
                            </p>
                        </div>
                        <div class="px-6 py-4 h-24 bg-white">
                            @foreach($article->tags()->get() as $tag)
                                <span class="inline-block bg-grey-lighter rounded-full px-3 py-1 text-sm font-semibold text-grey-darker">{{$tag->tag}}</span>
                            @endforeach
                        </div>
                    </div>
                </div>

        @if($loop->iteration%3==0)
            </div>
        @endif

    @endforeach

    <div class="flex m-12 pb-12 text-center">
        {{--<div class="w-full text-center">--}}
            {!! $articles->links() !!}
        {{--</div>--}}
    </div>

@stop