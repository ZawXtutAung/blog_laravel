<?php

namespace App\Http\Controllers;

use App\Comment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;

class CommentController extends Controller
{
    public function create(Request $request)
    {
        Comment::create([
            'content'    => $request->content,
            'article_id' => $request->article_id,
            'user_id'    => auth()->user()->id
        ]);

        return back()->with('info','A Comment Added');
    }
    public function delete(Comment $comment)
    {
//        if($comment->user_id==auth()->user()->id){
        if (Gate::allows('comment-delete',$comment)){
            $comment->delete();
            return back()->with('info','A Comment Deleted');
        } else {
            return back()->with('error','Unauthorize');
        }

    }
    public function __construct()
    {
        $this->middleware('auth');
    }
}
