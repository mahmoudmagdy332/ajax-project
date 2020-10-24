<?php
namespace App\Model;
use Illuminate\Database\Eloquent\Model;
class Like extends Model
{
 public $table="likes";
    protected $fillable=['id','like','dislike','post_id','trainee_id','created_at','updated_at'];
    public function post(){
        return $this->belongsTo('App\Model\Post');
    }
      public function trainee(){
        return $this->belongsTo('App\Model\Trainee');
    }
}
