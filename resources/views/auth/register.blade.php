@extends('layouts.logout')

@section('content')

{!! Form::open(['url' => '/register']) !!}

<main_register>

<h2>新規ユーザー登録</h2>

<div class="login_group">
<label class="login_text_3">ユーザー名</label>
{{ Form::text('username',null,['class' => 'input']) }}</br>
</div>

<div class="login_group">
<label class="login_text_2">メールアドレス</label>
{{ Form::text('mail',null,['class' => 'input']) }}</br>

</div>

<div class="login_group">
<label class="login_text_3">パスワード</label>

{{ Form::password('password',['class' => 'input']) }}
</div>

<div class="login_group">
<label class="login_text_2">パスワード確認</label>
{{ Form::password('password_confirmation',null,['class' => 'input']) }}
</div>


<button type="submit" class="btn btn-danger" onclick="location.href='https://127.0.0.1:8000/added'" style="width: 100px;margin-left: 120px;
margin-bottom: 40px;margin-top: 20px;">新規登録</button>

<p><a href="/login"style="color:white;">ログイン画面へ戻る</a></p>


</main_register>

@endsection
