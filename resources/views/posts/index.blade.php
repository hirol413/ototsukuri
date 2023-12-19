<!DOCTYPE html>
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
                width: 200px;
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
            <option name="one" value="1">クリーン</option>
            <option name="two" value="2">ドライブ</option>
            <option name="three" value="3">コンプレッサー</option>
            <option name="four" value="4">モジュレーション</option>
            <option name="five" value="5">リバーブ</option>
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
                        <button class="sbtn">再生</button>
                        <p class='tag'>タグ</p>
                        <p class='user_name'>username</p>
                    </div>
                </div>
            </div>
        </div>
        @endforeach
        </p>
        <div class="footer">
            <a href="/posts/create">新規投稿</a>
        </div>
    </body>
</html>