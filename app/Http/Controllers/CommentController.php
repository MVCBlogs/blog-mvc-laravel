<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\Comment;

class CommentController extends Controller
{
 
    public function createComment()
    {
        $data = []; //to be sent to the view
        $data["comments"] = Comment::all();
        return view('post.create')->with("data",$data);
    }
 
    public function saveComment(Request $request)
    {
        Comment::validate($request);
        Comment::create($request->only(["post_id","message"]));
        return back()->with('success','Comment Created successfully!');
    }
    
    public function showComment($id)
    {
        
        $data = []; //to be sent to the view
        $postnew = Comment::findOrFail($id);
 
        $data["message"] = $postnew->getMessage();
        $data["postid"] = $postnew;
        $data["date"]=$postnew->created_at->format('y-m-d');
        $data["datetime"]=$postnew->created_at->format('h:i');
      
        return view('post.show')->with("data",$data);

    }

}