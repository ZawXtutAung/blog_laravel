<?php

namespace App\Http\Controllers;

use App\Comment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;

class CommentController extends Controller
{
    public function create(){
        $comment=new Comment;
        $comment->comment =request()->contents;
        $comment->article_id =request()->article_id;
        $comment->user_id=auth()->user()->id;
        $comment->save();
        return back()->with('info','A Comment Added');;
    }
    public function delete($id)
    {
        $comment=Comment::find($id);
//        if($comment->user_id==auth()->user()->id){
        if (Gate::allows('comment-delete',$comment)){
            $comment->delete();
            return back();

        }else{
            return back()->with('error','Unauthorize');
        }


        return back()->with('info','A Comment Deleted');
    }
    public function __construct(){
        $this->middleware('auth');
    }
}
