<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;
use App\Models\Tag;
use App\Models\Instrument;
use Cloudinary;

class PostController extends Controller
{
    public function index(Post $post,Tag $tag,Instrument $instrument)//インポートしたPostモデルをインスタンス化して$postとして使用
    {
        return view('posts.index')->with(['posts' => $post->get(),'tags' => $tag->get()]);
    }
    
    public function show(Post $post)
    {
        return view('posts.show')->with(['post' => $post]);
    }
    
    public function create(Tag $tag,Instrument $instrument)
    {
        return view('posts.create')->with(['tags' => $tag->get(),'instruments' => $instrument->get()]);
    }
    
    public function store(Request $request, Post $post)
    {
        
        $input_post = $request['post'];
        $input_tags = $request->tags_array;
        if($request->hasFile('audio')){
            $audioFile = $request->file('audio');
            $sound_url = Cloudinary::uploadFile($audioFile->getRealPath())->getSecurePath();
            $input_post+=['sound'=>$sound_url];
            //return response()->json(['success' => true, 'message' => 'Audio uploaded and saved successfully']);
        }
        //return response()->json(['success' => false, 'message' => 'Audio not found in the request']);
            
        $post->fill($input_post)->save();
        
        //TagPost中間テーブルにデータ保存
        $post->tags()->attach($input_tags);
        
        
        return response()->json(['success' => true, 'message' => 'Post uploaded and saved successfully', 'post_id'=> $post->id]);
    }
}
