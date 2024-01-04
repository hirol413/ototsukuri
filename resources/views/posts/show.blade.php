<!DOCTYPE HTML>
<x-app-layout>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Posts</title>
        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">
        <style>
            .center{
                text-align:center;
            }
            .left{
                text-align:left;
            }
            .right{
                text-align:right;
            }
            .square {
                width: 500px;
                height: 500px;
                border: solid 3px #000000;
            }
            .imgsquare{
                width:400px;
                height:200px;
                background-color: lightblue;
            }
            .sbtn{
                border-radius: 5px;
                padding: 5px;
                text-decoration: none;
                color: black;
            }
            .usesqure{
                border-radius: 5px;
                border: solid 3px #000000;
                padding: 10px;
                text-decoration: none;
                color: black;
            }
            .likes{
                border-radius: 5px;
                background-color: blue;
                padding: 10px;
                text-decoration: none;
                color: white;
            }
            .field{
                display: flex;
            }
        </style>
    </head>
    <body>
        <div class="square">
            <div class='center'>
                <h1 class="title">{{$post->title}}</h1>
                <div class='imgsquare'>
                    <p>使用画像</p>
                    <div>
                        <audio src="{{$post->sound}}" controls></audio>
                    </div>
                </div>
                <p>
                <div class='field'>
                    <div class='usesqure'>instrument:{{$post->instrument->name}}</div>
                    <div class='usesqure'>
                    @foreach($post->tags as $tag)
                        tag:{{$tag->name}}
                    @endforeach
                    </div>
                </div>
                </p>
                
                <div class="content__post">
                    <h3>本文</h3> 
                    <p>{{$post->text}}</p>
                </div>
                <div class='field'>
                    <div class='username'>投稿者:{{$post->user->name}}</div>
                    <div class='time'>投稿日時:{{$post->created_at}}</div>
                    <button align = "right" class="likes">いいね</button>
                </div>
                
            </div>
        </div>
        
        <div class="content">
            
        </div>
        <div class="footer">
            <a href="/">戻る</a>
        </div>
    </body>
</html>
</x-app-layout>