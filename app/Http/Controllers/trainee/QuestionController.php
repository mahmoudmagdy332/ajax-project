<?php

namespace App\Http\Controllers\trainee;

use App\Http\Controllers\Controller;
use App\Model\Question;
use Illuminate\Http\Request;
use Auth;

class QuestionController extends Controller
{
    public function add(){
        return view('trainee.question');
    }
    public function store(Request $request){
        try{
            $image=null;
            if($request->file!=null) {
                $image = saveImage($request->file, 'trainee/question');
            }
            $e = Auth::user();
            $question=new Question();
            $question->question_description = $request['description'];
            $question->question_media = $request['file'];
            $question->trainee_id=$e->id;
            $question->save();
            return redirect()->route('trainee.home');
        }
        catch (\Exception $e){

        }


    }
}
