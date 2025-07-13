@extends('layouts.login')

@section('content')

<div style="padding-left:200px;display:flex;width:90%;padding-top: 50px;">

<img src="{{asset('storage/'.Auth::user()->images)}}" alt="" style="width:64px;height:64px; padding:10px;margin-right:20px;">

    <form method="POST" action="/bbs" enctype="multipart/form-data" style="width:90%;">
        @csrf

    <div class=profile>
        <label class=label_name>ユーザー名</label>
        <input type="text" value="{{ $user->username }}" class="input" name="name" >
    </div>
        <br>
    <div class=profile>
        <label class=label_name>メールアドレス</label>
        <input type="text" value="{{ $user->mail }}" class="input" name="mail">
    </div>
        <br>
    <div class=profile>
        <label class=label_name>パスワード</label>
        <input type="password" class="input" name="password" >
    </div>
        <br>
    <div class=profile>
        <label class=label_name>パスワード確認</label>
        <input type="password" value="" class="input" name="password_confirmation">
    </div>
        <br>
    <div class=profile>
        <label class=label_name>自己紹介</label>
        <textarea type="text" name="bio" rows="2" value="{{ $user->bio }}" class="input">{{ $user->bio }}</textarea>
    </div>
        <br>
    <div class=profile>
        <label class=label_name>アイコン画像</label>
            <label class=label_file>ファイルを選択
                <input type="file" name="images" style="display:none;">
            </label>
    </div>
        <br>
            <input type="submit" class="btn btn-danger" onclick="http://127.0.0.1:8000/top" value="更新" style="width:25%; margin-left:30%;">

        <br>
    </form>
</div>






@endsection
