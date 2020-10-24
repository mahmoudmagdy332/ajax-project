<?php

namespace App\Http\Controllers\trainee;
use App\Model\Like;
use App\Model\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Auth;

class LikeController extends Controller
{
    public function like(Request $request){
        $e=Auth::user();
        $c=Like::where('trainee_id',$e->id)->where('post_id',$request->id)->get()->first();
        $p= Post::where('post_id',$request->id)->get()->first();


        if($c==null){
            $like=new Like();
            $like->like = true;
            $like->post_id=$request->id;
            $like->trainee_id=$e->id;
            $like->save();
            $r=$p->post_rank+1;
        }
        else{
            $like=Like::where('trainee_id',$e->id)->where('post_id',$request->id);
            if($like->get()[0]->like==1){
                $like->update(['like'=>0]);
                $r=$p->post_rank-1;
            }
            else{
                if($like->get()[0]->dislike==1){
                    $r=$p->post_rank+2;
                }
                else {
                    $r=$p->post_rank+1;
                }
                $like->update(['like'=>1,'dislike'=>0]);

            }
        }
        Post::where('post_id',$request->id)->update(['post_rank'=>$r]);

        return response()->json([
            'status'=>'true',
            'id'=>Auth::user()->id,
            'like'=>$c->like,
            'dislike'=>$c->dislike,
            'rank'=>$r
        ]);
    }
    public function dislike(Request $request){
        $e=Auth::user();
        $c=Like::where('trainee_id',$e->id)->where('post_id',$request->id)->get()->first();
        $p= Post::where('post_id',$request->id)->get()->first();
        if($c==null){
            $like=new Like();
            $like->dislike = true;
            $like->post_id=$request->id;
            $like->trainee_id=$e->id;
            $like->save();
            $r=$p->post_rank-1;
        }
        else{
            $like=Like::where('trainee_id',$e->id)->where('post_id',$request->id);
            if($like->get()[0]->dislike==1){
                $like->update(['dislike'=>0]);
                $r=$p->post_rank+1;
            }
            else{
                if($like->get()[0]->like==1){
                    $r=$p->post_rank-2;
                }
                else{
                    $r=$p->post_rank-1;
                }
                $like->update(['like'=>0,'dislike'=>1]);
            }


        }
        Post::where('post_id',$request->id)->update(['post_rank'=>$r]);
        return response()->json([
            'status'=>'true',
            'id'=>Auth::user()->id,
            'like'=>$c->like,
            'dislike'=>$c->dislike,
            'rank'=>$r
        ]);
    }
}
