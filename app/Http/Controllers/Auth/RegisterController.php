<?php

namespace App\Http\Controllers\Auth;

use App\User;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Http\Request;

class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = '/home';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'username' => 'required|string|max:255',
            'mail' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:4|confirmed',
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\User
     */
    protected function create(array $data)
    {
        return User::create([
            'username' => $data['username'],
            'mail' => $data['mail'],
            'password' => bcrypt($data['password']),
        ]);
    }

    //画面表示
    public function registerForm(){
         return view("auth.register");
     }

    public function register(Request $request)
    {
        $request->validate([
            'username'=>'string | required | between:2,12',
            'mail'=>'required | between:5,40 | email | unique:users,mail',
            'password'=>'required | confirmed | alpha_num',
        ]);

        //入力した値の取得
        $username = $request->input('username');
        $mail = $request->input('mail');
        $password = $request->input('password');

        //送信後のデータの格納
        User::create([
            'username'=>$username,
            'mail'=>$mail,
            'password'=>$password,
        ]);

        $user = $request->input('username');
        $value = $request->session()->get('username');
        $request->session()->put('username', $user);

        return redirect('/added');
    }


    public function added(Request $request){

        return view('auth.added');
    }
}
