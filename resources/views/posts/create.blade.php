<!DOCTYPE HTML>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <title>Blog</title>
    </head>
    <body>
        <h1>Blog Name</h1>
        <form action="/posts" method="POST">
            @csrf
            <div class="profile">
                <h2>sound</h2>
                <input type="number" name="post[profiles_id]" placeholder="id"/>
            </div>
            <div class="instrument">
                <h2>sound</h2>
                <input type="number" name="post[instruments_id]" placeholder="id"/>
            </div>
            <div class="sound">
                <h2>sound</h2>
                <input type="text" name="post[sound]" placeholder="sound"/>
            </div>
            <div class="img">
                <h2>sound</h2>
                <input type="text" name="post[img]" placeholder="img"/>
            </div>
            <div class="title">
                <h2>Title</h2>
                <input type="text" name="post[title]" placeholder="投稿タイトル入力"/>
            </div>
            <div class="body">
                <h2>Body</h2>
                <textarea name="post[text]" placeholder="説明文及び使用機材詳細入力"></textarea>
            </div>
            <div class="tags">
                <label for="tag-id">{{ __('Tag1') }}
                <select class="form-select" id="category-id" name="category_id">
                    @foreach ($tags as $tag)
                        <option value="{{ $tag->id }}" @if(old('tag_id') == $tag->id) selected @endif>{{ $tag->tag_name }}</option>
                    @endforeach
                </select>
                </label>
            </div>

            <div class="Tag">
                <h2>Tag1</h2>
                <input type="number" name="Tag1" placeholder="id"/>
                <h2>Tag2</h2>
                <input type="number" name="Tag2" placeholder="id"/>
                <h2>Tag3</h2>
                <input type="number" name="Tag3" placeholder="id"/>
            </div>
            <input type="submit" value="投稿"/>
        </form>
        <div class="footer">
            <a href="/">戻る</a>
        </div>
    </body>
</html>