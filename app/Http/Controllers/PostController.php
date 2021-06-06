<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;
use App\Models\Comment;

class PostController extends Controller
{
    public static function list()
    {
        $data = []; //to be sent to the view
        $data["title"] = "Posts";
        $data["description"] = "List of posts";
        $data["posts"] = Post::all();
       
        return view('post.list')->with("data", $data);
    }

    public static function show($id)
    {
        $data = []; //to be sent to the view
        $post = Post::findOrFail($id);

        $data["title"] = $post->getTitle();
        $data["description"] = $post->getDescription();
        $data["post"] = $post;

        return view('post.show')->with("data", $data);
    }

    public static function save(Request $request)
    {
        Post::validate($request);
        Post::create($request->only(["title","description"]));

        return back()->with('success', 'Post created successfully!');
    }

    public static function saveComment(Request $request)
    {
        Comment::validate($request);
        Comment::create($request->only(["post_id","message"]));

        return back()->with('success', 'Comment created successfully!');
    }

    public static function deleteComment($id)
    {
        $comment = Comment::findOrFail($id);
        $comment->delete();

        return back()->with('success', 'Comment deleted successfully!');
    }
}
