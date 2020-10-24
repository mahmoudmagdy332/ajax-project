<?php

namespace App\Http\Controllers\trainee;

use App\Http\Controllers\Controller;
use App\Model\Post;
use App\Model\Follow;
use Auth;
use Illuminate\Http\Request;

class ProfileController extends Controller
{
    public function profile($id){
        $e=Auth::user();
        $f= Follow::where('trainee_id',$e->id)->where('coach_id',$id)->first();
        $p= Post::leftJoin('likes','likes.post_id','posts.post_id')->where('coach_id',$id)->get();
        $arr=Array('follow'=>$f,'id'=>$id,'posts'=>$p);

        return view('trainee.profile',$arr);
    }
    public function follow(Request $request){
        $f=new Follow();
        $e=Auth::user();
        $f->coach_id=$request->id;
        $f->trainee_id=$e->id;
        $f->save();
        return response()->json([
            'status'=>'true',
            'id'=>$request->id
        ]);

    }
    public function unfollow(Request $request){
        $e=Auth::user();
        $f= Follow::where('trainee_id',$e->id)->where('coach_id',$request->id)->delete();
    }
}
