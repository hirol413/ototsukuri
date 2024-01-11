<!DOCTYPE html>
<x-app-layout>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <title>Blog</title>
        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">
        <style>
            .center{
                text-align:center;
            }
            .btn {
                border-radius: 5px;
                background-color: lightblue;
                padding: 10px;
                text-decoration: none;
                color: black;
            }
            .sbtn{
                border-radius: 5px;
                padding: 5px;
                text-decoration: none;
                color: black;
            }
            .square {
                width: 320px;
                height: 200px;
                border: solid 3px #000000;
            }
            .field{
                display: flex;
                justify-content: space-around;
            }
            .instfield{
                display: flex;
                justify-content: start;
            }
            .paginate{
                text-align:center;
            }
            .title{
                font-size:32px;
            }
            .posttitle{
                font-size:20px;
            }
            .circle{
                width: 100px;
                height: 30px;
                border-radius: 50px;
                border: 1px solid;
                box-sizing: border-box;
            }
        </style>
    </head>
    <body>
        <x-slot name="header">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                {{ __('投稿一覧') }}
            </h2>
        </x-slot>
        <br><br>
        <div class="instfield">
            @foreach($instruments as $instrument)
            <div class="circle center">
                <a href="/instruments/{{$instrument->id}}">{{$instrument->name}}</a>
            </div>
            @endforeach
        </div>
        <br><br>
        <p>
        <div class="field">
        @foreach ($posts as $post)
        <div class="square">
            <div class='center'>
                <div class='posts'>
                    <div class='post'>
                        <h2 class='posttitle'>
                            <a href="/posts/{{$post->id}}">{{$post->title}}</a>
                        </h2>
                        <div>
                            <audio src="{{$post->sound}}" controls></audio>
                        </div>
                        <p class='tag'>
                        @foreach($post->tags as $tag)
                            タグ:{{$tag->name}}
                        @endforeach
                        </p>
                        <p class='instrument_name'>使用楽器:{{$post->instrument->name}}</p>
                        
                    </div>
                </div>
            </div>
            <p class='user_name'>投稿者:{{$post->user->name}}</p>
        </div>
        @endforeach
        </div>
        </p>
        <div class='paginate'>{{$posts->links()}}</div>
    </body>
</html>
</x-app-layout>