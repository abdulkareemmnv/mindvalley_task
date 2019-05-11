@extends('layouts.master')

@section('title','Article')

@section('css')
    <style>
        .pictures {
            list-style: none;
            margin: 0;
            /*max-width: 30rem;*/
            padding: 0;
        }

        .pictures > li {
            border: 1px solid transparent;
            float: left;
            height: calc(100% / 2);
            overflow: hidden;
            width: calc(100% / 2);
        }

        .pictures > li > img {
            cursor: pointer;
            width: 100%;
        }

        .viewer-download {
            color: #fff;
            font-family: FontAwesome, serif;
            font-size: 0.75rem;
            line-height: 1.5rem;
            text-align: center;
        }

        .viewer-download::before {
            content: "\f019";
        }
    </style>
@stop

@section('content')

    <nav class="p-4 rounded  mx-12 mt-6 bg-grey-lighter">
        <ol class="list-reset flex text-teal-dark">
            <li><a href="{{url('/')}}" class="text-blue font-bold">Articles</a></li>
            <li><span class="mx-2">/</span></li>
            <li>{{$article->title}}</li>
        </ol>
    </nav>

    <div class="flex mx-12 mt-6">
        <div class="w-2/5 bg-white">
            <div id="galley">
                <ul class="pictures">
                    @foreach($article->photos()->get() as $photo)
                        <li><img data-original="{{url('storage/images/'.$photo->photo)}}" src="{{url('storage/images/'.$photo->photo)}}" alt="article image"></li>
                    @endforeach
                </ul>
            </div>
            <div style="clear: both"></div>
            <div class="px-6 py-4 h-24 bg-white rounded border border-solid border-grey">
                @foreach($article->tags()->get() as $tag)
                    <span class="inline-block bg-grey-lighter rounded-full px-3 py-1 text-sm font-semibold text-grey-darker">{{$tag->tag}}</span>
                @endforeach
            </div>
        </div>
        <div class="w-3/5 bg-white">
            <div class=" m-2 p-4 justify-between leading-normal">
                <div class="text-teal font-bold text-xl mb-2"><h2>{{$article->title}}</h2></div>
                <p class="text-grey-darker text-base">{!! $article->content !!}</p>
            </div>
        </div>
    </div>

@stop

@section('js')
    <script>
        window.addEventListener('DOMContentLoaded', function () {
            var galley = document.getElementById('galley');
            var viewer = new Viewer(galley, {
                url: 'data-original',
                toolbar: {
                    oneToOne: true,

                    prev: function() {
                        viewer.prev(true);
                    },

                    play: true,

                    next: function() {
                        viewer.next(true);
                    },

                    download: function() {
                        const a = document.createElement('a');

                        a.href = viewer.image.src;
                        a.download = viewer.image.alt;
                        document.body.appendChild(a);
                        a.click();
                        document.body.removeChild(a);
                    },
                },
            });
        });
    </script>
@stop