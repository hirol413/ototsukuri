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
        $input = $request['post'];
        $post->fill($input)->save();
        
        //TagPost中間テーブルにTagIDとPostIDをinsert
        //$input_tag[0] = $request->get('Tag1');
        //$input_tag[1] = $request->get('Tag2');
        //$input_tag[2] = $request->get('Tag3');
        
        return redirect('/post/' . $post->id);
    }
}
