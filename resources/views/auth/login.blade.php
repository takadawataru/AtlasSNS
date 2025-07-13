@extends('layouts.logout')

@section('content')

{!! Form::open() !!}


<main>

<p>AtlasSNSへようこそ</p>

<div class="login_group">
<label class="login_text">メールアドレス</label>
{{ Form::text('mail',null,['class' => 'input']) }}</br>
</div>

<div>
<label class="login_text_pass">パスワード</label>
{{ Form::password('password',['class' => 'input']) }}
</div>


<button type="submit" class="btn btn-danger" onclick="location.href='http://127.0.0.1:8000/login'" style="width: 100px;margin-left: 120px;
margin-bottom: 40px;margin-top: 20px;">ログイン</button>



<p><a href="/register"style="color:white;">新規ユーザーの方はこちら</a></p>

</main>

@endsection
