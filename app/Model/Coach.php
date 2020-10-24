<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Coach extends Authenticatable
{
    protected $guard='admin';
    protected $primaryKey = 'id';
    public $table="coaches";
    protected $fillable=['id','coach_name','coach_email','password','coach_age','coach_gender','created_at','updated_at'];
    public function posts(){
        return $this->hasMany('App\Post');
    }
    public function answers(){
        return $this->hasMany('App\Answer');
    }
}
