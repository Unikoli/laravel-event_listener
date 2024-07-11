<?php

namespace App\Http\Controllers;

use App\Events\PostCreated;
use App\Models\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{
    public function post_index(){
        $posts=Post::all();
        return view('post',compact('posts'));
    }
    public function post_create(){
        return view('postAdd');
    }
    public function post_store(Request $request){
        $post=new Post();
        $post->title=$request->title;
        $post->body=$request->body;
        $post->save();
        
        event(new PostCreated($post));
        // dd($post);
        return redirect('posts');
    }

}
