<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Post;
use App\User;
use Auth;
use Validator;

class PostsController extends Controller
{
    //
    public function index()
    {
    //  $user_contacts =\DB::table('users')
     // ->select('posts.user_id','users.id')
    //  ->join('users','id', '=', 'posts', 'id')
    //  ->get();
    $id = \Auth::user()->id;
    $follow_id =\Auth::user()->follows()->pluck('followed_id')->toArray();
    $posts = Post::whereIn('user_id',array_merge($follow_id,[$id]))->orderBy('created_at','desc')->get();
        return view('posts.index',[
            'posts'=> $posts
        ]);
    }

    public function createForm()
    {
        return view('posts .top');
    }

 public function create(Request $request)
    {
        $request->validate([
            'newPost'=>'string | required | between:1,150',
        ]);

        $post = $request->input('newPost');
        $user_id = \Auth::user()->id;
        \DB::table('posts')->insert([
            'user_id' =>$user_id,
            'post' => $post
        ]);

        return redirect('top');
    }

    public function updateForm($id)
    {
        $post = \DB::table('posts')
            ->where('id', $id)
            ->first();
        return redirect('top');
    }

        public function update(Request $request)
    {
        $id = $request->input('id');
        $up_post = $request->input('upPost');
        \DB::table('posts')
            ->where('id', $id)
            ->update(
                ['post' => $up_post]
            );

        return redirect('top');
    }


    public function delete($id)
    {
        \DB::table('posts')
            ->where('id', $id)
            ->delete();

            return redirect('top');
    }

    public function edit(Request $request)
    {
       $id = $request->input('id');
        $up_post = $request->input('upPost');//inputタグのname属性に合わせる
        \DB::table('posts')
            ->where('id', $id)
            ->update(
                ['post' => $up_post]
            );
    return redirect('top');
    }







        }

// public function store(Request $request)
// {
//     $validator = Validator::make($request->all(), [
// 'post_title' => 'required|max:255',
// 'post_content' => 'required|max:255',
// ]);

// 　if ($validator->fails()) {
// 　　　　return redirect('/top')
// 　　　　　　　　->withInput()
// 　　　　　　　　->withErrors($validator);
// 　　}

// $posts = new Post;
// 　　　　$posts->post_title = $request->post_title;
// 　　　　$posts->post_content = $request->post_content;
// 　　　　$posts->user_id = Auth::id();
// 　　　　$posts->save();

// 　　　　return redirect('/');
// }
