<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;
use App\Models\Tag;
use App\Models\Instrument;
use App\Models\User;
use Cloudinary;
use Illuminate\Support\Facades\Auth;

class PostController extends Controller
{
    public function index(Post $post,Tag $tag,Instrument $instrument)//インポートしたPostモデルをインスタンス化して$postとして使用
    {
        
        return view('posts.index')->with(['posts' => $post->getPaginateByLimit(),'tags' => $tag->get(),'instruments' => $instrument->get()]);
    }
    
    public function show(Post $post,Tag $tag)
    {
        return view('posts.show')->with(['post' => $post,'tags' => $tag->get()]);
    }
    
    public function create(Tag $tag,Instrument $instrument)
    {
        return view('posts.create')->with(['tags' => $tag->get(),'instruments' => $instrument->get()]);
    }
    
    public function store(Request $request, Post $post)
    {
        
        $input_post = $request['post'];
        $input_post += ['user_id'=>$request->user()->id];
        $input_tags = $request->tags_array;
        if($request->hasFile('audio')){
            $audioFile = $request->file('audio');
            $sound_url = Cloudinary::uploadFile($audioFile->getRealPath())->getSecurePath();
            $input_post += ['sound'=>$sound_url];
        }
        if($request->hasFile('image')){
            $image_url = Cloudinary::upload($request->file('image')->getRealPath())->getSecurePath();
            $input_post += ['img'=>$image_url];
        }
            
        $post->fill($input_post)->save();
        
        //TagPost中間テーブルにデータ保存
        $post->tags()->attach($input_tags);
        
        //js側で画面遷移させるためにpost_idを返す
        return response()->json(['success' => true, 'message' => 'Post uploaded and saved successfully', 'post_id'=> $post->id]);
    }
}
