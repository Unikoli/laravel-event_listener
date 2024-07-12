<?php

namespace App\Http\Controllers;

use App\Events\PostCreated;
use App\Models\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{
    public function post_index()
    {
        
        // $posts = Post::where('user_id',auth()->user()->id)->get();
        $posts=Post::where('user_id',auth()->user()->id)->get();
        return view('post', compact('posts'));
    }
    public function post_create()
    {
        return view('postAdd');
    }
    public function post_store(Request $request)
    {
        if ($user = auth()->user()) {
            $post = new Post();
            $post->title = $request->title;
            $post->user_Id = $user->id;
            $post->body = $request->body;
            $post->save();

            event(new PostCreated($post));
            // dd($post);
            return redirect('posts');
        } else {
            return view('forbiddenError');
        }
    }
}
