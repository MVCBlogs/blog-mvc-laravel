<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\Post;
use App\Models\Comment;


class PostController extends Controller
{
   
    public function create()
    {
        $data = []; //to be sent to the view
        $data["title"] = "Create Post";
        $data["posts"] = Post::all();
       
        return view('post.create')->with("data",$data);
    }

    public function save(Request $request)
    {
        Post::validate($request);
        Post::create($request->only(["name","description"]));
        return back()->with('success','Post created successfully!');
    }

 
    public function show($id)
    {
        
        $data = []; //to be sent to the view
        $post = Post::findOrFail($id);
   
 
        $data["title"] = $post->getName();
        $data["posts"] = $post;
        $data["date"]=$post->created_at->format('y-m-d');
        $data["datetime"]=$post->created_at->format('h:i');
        return view('post.show')->with("data",$data);

    }


}
