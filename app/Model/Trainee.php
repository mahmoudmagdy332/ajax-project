<?php

namespace App\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Database\Eloquent\Model;

class Trainee extends Authenticatable
{
     public $table="trainees";
    protected $primaryKey = 'id';
    protected $fillable=['id','trainee_name','trainee_email','password','trainee_age','trainee_gender','created_at','updated_at'];
    public function comments(){
        return $this->hasMany('App\Comment');
    }
    public function likes(){
        return $this->hasMany('App\Like');
    }
     public function questions(){
        return $this->hasMany('App\Question');
    }
}
