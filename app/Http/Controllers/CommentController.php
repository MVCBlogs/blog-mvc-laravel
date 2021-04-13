<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\Comment;

class CommentController extends Controller
{
    public function saveComment(Request $request)
    {
        Comment::validate($request);
        Comment::create($request->only(["post_id","message"]));
        return back()->with('success','Comment Created successfully!');
    }
}