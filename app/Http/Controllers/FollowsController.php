<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\Post;
use App\User;

class FollowsController extends Controller
{
public function followList_icon(){
         $following_id =Auth::user()->follows()->pluck('followed_id');//フォローしているユーザーid取得
         return view('follows.followList',compact('posts'));
    }

     public function followerList_icon(){

       $following_id =Auth::user()->follows()->pluck('following_id');//フォローされているユーザーid取得
        return view('follows.followerList',compact('posts'));
    }

    //
    public function followList(){
        $followers=Auth::user()->follows()->get();
         $following_id =Auth::user()->follows()->pluck('followed_id');//フォローしているユーザーid取得
        $posts= Post::with('user')->whereIn('user_id' , $following_id)->orderBy('created_at','desc')->get();//idで投稿内容取得
        return view('follows.followList',compact('posts','followers'));
    }


    public function followerList(){
        $followers=Auth::user()->followers()->get();
       $following_id =Auth::user()->followers()->pluck('following_id');//フォローされているユーザーid取得
        $posts= Post::with('user')->whereIn('user_id' , $following_id)->orderBy('created_at','desc')->get();//idで投稿内容取得
        return view('follows.followerList',compact('posts','followers'));
    }



}
