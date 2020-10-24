<?php

namespace App\Http\Controllers\coach;

use App\Http\Controllers\Controller;
use App\Model\Coach;
use App\Model\Post;
use App\Model\Trainee;
use Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;


class HomeController extends Controller
{
    public function index(){
        $c=Auth::user();
        $p= Post::where('coach_id',$c->id)->get();
        $arr=Array('posts'=>$p,'coach'=>$c);
        return view('coach.home',$arr) ;

    }
    public function logout(){
        Auth::guard('coach')->logout();
        return redirect()->route('login');
    }
}
