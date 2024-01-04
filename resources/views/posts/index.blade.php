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
                width: 350px;
                height: 200px;
                border: solid 3px #000000;
            }
        </style>
    </head>
    <body>
        <h1 class="center">投稿一覧</h1>
        <button class="btn">ギター</button>
        <button class="btn">ベース</button>
        <button class="btn">その他</button>
        <select>
            @foreach($tags as $tag)
                <option>{{$tag->name}}</option>
            @endforeach
        </select>
        <p>
        @foreach ($posts as $post)
        <div class="square">
            <div class='center'>
                <div class='posts'>
                    <div class='post'>
                        <h2 class='title'>
                            <a href="/posts/{{$post->id}}">{{$post->title}}</a>
                        </h2>
                        <!--<button class="sbtn">再生</button>-->
                        <div>
                            <audio src="{{$post->sound}}" controls></audio>
                        </div>
                        <p class='tag'>
                        @foreach($post->tags as $tag)
                            tag:{{$tag->name}}
                        @endforeach
                        </p>
                        <p class='instrument_name'>instrument:{{$post->instrument->name}}</p>
                        <p class='user_name'>投稿者:{{$post->user->name}}</p>
                    </div>
                </div>
            </div>
        </div>
        @endforeach
        </p>
        <div class='paginate'>{{$posts->links()}}</div>
        <div class="footer">
            <a href="/posts/create">新規投稿</a>
        </div>
    </body>
</html>
</x-app-layout>