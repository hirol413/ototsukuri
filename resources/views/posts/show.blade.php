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
                margin: 0px auto;
                width:1000px;
            }
            .center_field{
                display: flex;
                margin: 10px auto;
                width: 300px;
            }
        </style>
    </head>
    <body>
            <div class='center'>
                <h1 class="title" style="font-size:30px;">{{$post->title}}</h1>
                <div class='center_field'>
                    <img src="{{ $post->img}}" alt="画像はありません"/>
                </div>
                <div class='center_field'>
                    <audio src="{{$post->sound}}" controls></audio>
                </div>
                
                <div class='center_field'>
                    <div class='usesqure'>{{$post->instrument->name}}</div>
                    <div class='usesqure'>
                    @foreach($post->tags as $tag)
                        {{$tag->name}}
                    @endforeach
                    </div>
                </div>
                
                
                <div class="content__post">
                    <h3>{{$post->text}}</h3>
                </div>
                <div class='field'>
                    <div class='username'>投稿者:{{$post->user->name}}</div>
                    <!--<button align = "right" class="likes">いいね</button>-->
                </div>
                <div class='field'>
                    <div class='time'>投稿日時:{{$post->created_at}}</div>
                    <!--<button align = "right" class="likes">いいね</button>-->
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