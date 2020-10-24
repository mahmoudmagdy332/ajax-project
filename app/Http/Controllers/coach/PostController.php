<?php

namespace App\Http\Controllers\coach;

use App\Http\Controllers\Controller;
use App\Model\Post;
use Auth;
use Illuminate\Http\Request;

class PostController extends Controller
{
 public function add(){
     return view('coach.add_post');
 }
    public function store(Request $request)
    {
try{
    $image=null;
    if($request->file!=null) {
        $image = saveImage($request->file, 'coach/post');
    }
    $e = Auth::user();
    $post = new Post();
    $post->post_description = $request['description'];
    $post->post_media = $image;
    $post->coach_id = $e->id;
    $post->save();
    return redirect()->route('coach.home');
}
catch (\Exception $e){

}

    }
}
