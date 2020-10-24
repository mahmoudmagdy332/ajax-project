<?php

namespace App\Http\Controllers\trainee;

use App\Http\Controllers\Controller;
use App\Model\Coach;
use App\Model\Trainee;
use App\Model\Post;
use Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use phpDocumentor\Reflection\Types\Array_;


class HomeController extends Controller
{
    public function index(Request $request){
        $c= Trainee::Join('follows','trainees.id','trainee_id')->rightJoin('coaches','coaches.id','coach_id')
            ->get()->take(3);
        if ($request->isMethod('post')) {
            if(isset($request->getdata)){
                $e=Auth::user();
                $p=DB::table('trainees')->join('follows','trainees.id','follows.trainee_id')->join('coaches','coaches.id','follows.coach_id')
                    ->join('posts','coaches.id','posts.coach_id')->leftjoin('likes',function($join){
                        $join->on('likes.post_id','=','posts.post_id');
                        $join->on('trainees.id','=','likes.trainee_id');
                    })->where('trainees.id',$e->id)
                    ->select('posts.post_description','posts.post_media','coaches.coach_name','posts.post_id','posts.post_rank','likes.like','likes.dislike')
                    ->skip($request->start)->take($request->limit)->get();
                if($p->count()>0){
                    $response="";
                    foreach ($p as $post){
                        $response.=  '<section class="about-section spad" >
            <div class="container">
                <div class="row">';
                        if($post->post_media) {
                            $response .= '<div class="col-lg-6">
                            <div class="about-pic">
                                <img src="' . asset('coach/post/' . $post->post_media) . '"></div></div>';
                      }
                        $response .= '<div class="col-lg-6">
                        <div class="about-text">
                            <h2>'.$post->coach_name.'</h2>

                            <p class="first-para">'. $post->post_description .'</p>
                            <a href="#">read more</a><br><br>

                                <label class="up" style="display: none">'.$post->post_rank.'<i class="fa fa-thumbs-up" wedth="5"></i></label>

                                <label class="down" style="display: none">' .$post->post_rank*-1 .'<i class="fa fa-thumbs-down" wedth="10"></i></label>

                            <br><br>
                            <div  class="primary-btn">
                            <a  href="/trainee/comment'.$post->post_id .'" ><i class="fa fa-comment"></i>comment</a>
                            </div>
                            <br><br>
                       <div ';
                        if($post->like==1){ $response .='style="color:black "';}   $response .='class="primary-btn">
                           <a ir="'.$post->post_id.'" id="like" class="like'.$post->post_id.Auth::user()->id.'"><i class="fa fa-thumbs-up" wedth="5" ></i>like</a>

                       </div>
                            <div  class="primary-btn"'; if($post->dislike==1){$response .='style="color:black "';}$response .='>
                            <a ir="'.$post->post_id.'" id="dislike" class="dislike'.$post->post_id.Auth::user()->id.'"><i class="fa fa-thumbs-down" wedth="5"></i>dislike</a>
                            </div>
                                <br><br>
                        </div>
                    </div>
                </div>

            </div>
        </section>';
                    }
                    exit($response);
                }
                else{
                    exit('reachedMax');
                }
            }
        }
        else{
            $arr=Array('coaches'=>$c);
            return view('trainee/home',$arr);
        }
    }
    public function GetPostData(Request $request){
        $e=Auth::user();
        $p=DB::table('trainees')->join('follows','trainees.id','follows.trainee_id')->join('coaches','coaches.id','follows.coach_id')
            ->join('posts','coaches.id','posts.coach_id')->leftjoin('likes',function($join){
                $join->on('likes.post_id','=','posts.post_id');
                $join->on('trainees.id','=','likes.trainee_id');
            })->where('trainees.id',$e->id)
            ->select('posts.post_description','posts.post_media','coaches.coach_name','posts.post_id','posts.post_rank','likes.like','likes.dislike')
            ->skip($request->id*2)->take(3)->get();

        $posts=json_encode($p);
       return $posts;
    }
    public function search(Request $request){
        $q=$request['q'];
        if($q!="") {
            $p=DB::table('coaches')->join('posts','coaches.id','posts.coach_id')->leftJoin('likes','likes.post_id','posts.post_id') ->where('post_description','LIKE','%'.$q.'%')->get();
            return view('trainee.search',['posts'=>$p]);
        }
    }
    public function logout(){
        Auth::guard('web')->logout();
        return redirect()->route('login');
    }
    public function test(Request $request){
        if ($request->isMethod('post')) {
       if(isset($request->getdata)){
          $p= Post::skip($request->start)->take($request->limit)->get();
          if($p->count()>0){
            $response="";
            foreach ($p as $post){
               $response.= '<div>
                <h1>'.$post->post_id.'</h1>
                <p>'.$post->post_description.'</p></div>';
            }
              exit($response);
          }
             else{
                 exit('reachedMax');
             }
       }
    }
        else{
            return view('trainee.test');
        }
    }
}
