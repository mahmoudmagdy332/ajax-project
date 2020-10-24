<?php

namespace App\Http\Controllers;
use App\Model\Coach;
use App\Model\Trainee;
use Auth;
use App\Http\Requests\LoginRequest;
use App\Http\Requests\RegesterRequest;
use Illuminate\Http\Request;

class LoginController extends Controller
{
    public function get_login(){
        return view('login');
    }
    public function login(Request $req){
        if(Auth::guard('coach')->attempt(['coach_email'=>$req->email,'password'=>$req->password])){
            return redirect('/coach/home');
        }

        elseif(Auth::attempt(['trainee_email'=>$req->email,'password'=>$req->password])){
            return redirect('/trainee/home');
        }
        else{
            return redirect()->back();
        }
    }
    public function get_regester(){
        return view('regester');
    }
    public function regester(RegesterRequest $req){
        if($req->place=='coach') {
            $coach = new Coach();
            $coach->coach_name = $req->name;
            $coach->coach_email = $req->email;
            $coach->coach_pass = bcrypt($req->password);
            $coach->coach_age = $req->age;
            $coach->coach_gender = $req->gender;
            $coach->save();
        }
        else{
            $trainee = new Trainee();
            $trainee->trainee_name = $req->name;
            $trainee->trainee_email = $req->email;
            $trainee->trainee_pass = bcrypt($req->password);
            $trainee->trainee_age = $req->age;
            $trainee->trainee_gender = $req->gender;
            $trainee->save();
        }
    }

}
