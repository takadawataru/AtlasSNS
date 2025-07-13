@extends('layouts.logout')

@section('content')

<main_added>

<div id="clear" style="font-weight:bold; margin-bottom:50px">
   <p class="username">
    {{session ("username") }}さん</p>
  <p>ようこそ！AtlasSNSへ</p>
</div>

<div id="clear_2" style="font-size:15px;">
  <p>ユーザー登録が完了いたしました。</p>
  <p  style=" margin-bottom:30px">早速ログインをしてみましょう!</p>
</div>
  <button type="button" class="btn btn-danger" onclick="location.href= 'http://127.0.0.1:8000/login'" style="width: 150px;">ログイン画面へ</button>




</main_added>

@endsection
