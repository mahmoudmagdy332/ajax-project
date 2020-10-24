<?php

namespace App\Http\Controllers\trainee;

use App\Model\Comment;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Auth;

class CommentController extends Controller
{
    public function WriteComment(Request $request,$id){

                $comment=new Comment();
                $comment->comment_description = $request->input('description');
                $comment->post_id=$id;
                $comment->trainee_id= Auth::user()->id;
                $comment->save();

        return redirect('/trainee/home') ;
    }
    public function show_comments($id){

        $c= Comment::where('post_id',$id)->get();
        $arr=Array('comments'=>$c,'post'=>$id);
        return view('trainee.comment',$arr);


    }

}
