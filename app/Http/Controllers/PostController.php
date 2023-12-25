<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;
use App\Models\Tag;

class PostController extends Controller
{
    public function index(Post $post,Tag $tag)//インポートしたPostモデルをインスタンス化して$postとして使用
    {
        return view('posts.index')->with(['posts' => $post->get(),'tags' => $tag->get()]);
    }
    
    public function show(Post $post)
    {
        return view('posts.show')->with(['post' => $post]);
    }
    
    public function create(Tag $tag)
    {
        return view('posts.create')->with(['tags' => $tag->get()]);
    }
    
    public function store(Request $request, Post $post)
    {
        $input_post = $request['post'];
        $input_tags = $request->tags_array;
        $post->fill($input_post)->save();
        
        //TagPost中間テーブルにデータ保存
        $post->tags()->attach($input_tags);
        
        
        return redirect('/posts/' . $post->id);
    }
}
