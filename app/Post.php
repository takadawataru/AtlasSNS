<?php

namespace App;
use App\Post;
use App\User;
use Auth;
use Validator;


use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    public function user() {
    return $this->belongsTo('App\User');//user.phpとリレーション
}



}
