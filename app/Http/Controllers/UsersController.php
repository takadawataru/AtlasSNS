<?php

namespace App\Http\Controllers;
use DB;
use Illuminate\Http\Request;
use App\User;
use App\Post;
use Auth;

class UsersController extends Controller
{
    //
    public function profile(){
         $user = Auth::user();
         //dd($user);
        return view('users.profile',[
            'user'=>$user
        ]);
    }

 public function otherProfile($id){
         $user = User::where('id', $id)->first();
         $posts = Post::where('user_id', $id)->get();
        return view('users.otherProfile',[
            'user'=>$user ,'posts'=>$posts
        ]);
    }

    public function search(){
         $users = User::get();

        return view('users.search',[
            'users'=> $users
        ]);
    }



    public function user_update(Request $request)
    {
         $request->validate([
            'name'=>'string | required | between:2,12',
            'mail'=>'required | between:5,40 | email |unique:users,mail,' . Auth::id() . ',id',
            'password'=>'required | confirmed | alpha_num',
            'bio'=>'max:150',
            'icon'=>'file | image | mimes:jpg,png,bmp,gif,svg',
        ]);

         //入力した値の取得
        $id = Auth::user()->id;
        $name = $request->input('name');
        $mail = $request->input('mail');
        $password = $request->input('password');
        $bio = $request->input('bio');
          $filename=$request->images->getClientOriginalName();  //('')にフォルダ名を指定
     $icon=$request->images->storeAs('user_icon',$filename,'public');
         \DB::table('users')
         ->where('id',$id)
         ->update(
                 ['username' => $name,
                   'mail' => $mail,
                   'password' => bcrypt($password),
                   'bio' => $bio,
                   'images' =>$icon
                ]);
        return redirect('/top');
    }






     public function index(Request $request){

        $query = User::query();
         $search = $request->input('username');

          if (!empty($search)) {
            $query->where('username', 'LIKE', "%{$search}%");
          $users = $query->get();
          }
            return view('users.search',[  //データの送り先の指定　第一引数
                'users'=> $users ,    //分かりやすい表示に置き換える
                'search' => $search
            ]);

    }

   // フォロー
    public function follow(User $user)
    {

        $follower = Auth::user();
        // フォローしているか
        $is_following = $follower->isFollowing($user->id);
        if(!$is_following) {
            // フォローしていなければフォローする
            $follower->follow($user->id);
            return back();
        }
    }

    // フォロー解除
    public function un_follow(User $user)
    {

        $follower = Auth::user();
        // フォローしているか
        $is_following = $follower->isFollowing($user->id);
        if($is_following) {
            // フォローしていればフォローを解除する
            $follower->un_follow($user->id);
            return back();
        }
    }


    //ログアウト
    public function logout(){
        Auth::logout();
        return redirect('/login');
        }
}
