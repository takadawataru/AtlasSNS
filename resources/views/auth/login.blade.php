@extends('layouts.logout')

@section('content')

{!! Form::open() !!}


<main>

<p>AtlasSNSへようこそ</p>

{{ Form::label('e-mail') }}
{{ Form::text('mail',null,['class' => 'input']) }}
{{ Form::label('password') }}
{{ Form::password('password',['class' => 'input']) }}

{{ Form::submit('ログイン') }}

{!! Form::close() !!}

<p><a href="/register">新規ユーザーの方はこちら</a></p>

</main>

@endsection
