<?php
namespace App\Model;
use Illuminate\Database\Eloquent\Model;
class Post extends Model
{
       public $table="posts";
    public function coach(){
        return $this->belongsTo('App\Model\Coach');
    }
    public function comments(){
        return $this->hasMany('App\Model\Comment');

    }
    public function likes(){
        return $this->hasMany('App\Model\Like');
    }
}
