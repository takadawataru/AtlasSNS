@extends('layouts.login')

@section('content')

<h2>ユーザー検索</h2>
<form action="/search_result" method="POST">
    @CSRF
    <input type="search" name="username" placeholder="ユーザー名">
    <input type="submit" name="search" value="検索">
</form>

@if(!empty($search))
    <p>検索ワード：{{$search}}</p>
@endif


<table class='table table-hover'>
    <tr>
        <th></th>
         <th>ユーザー</th>
    </tr>
@foreach ($users as $user)
        <tr>

     <td><img src="{{asset('storage/'.$user->images)}}" alt=""></td>
      <td>{{$user ->username }}</td>
@if (Auth::user()->isFollowed($user->id))
    <div>
        <span>フォローされています</span>
    </div>
@endif

<div>
        @if (Auth::user()->isFollowing($user->id))
    <form action="{{ route('un_follow', ['user' => $user->id]) }}" method="POST">
         {{ csrf_field() }}
        <button type="submit" class="btn btn-danger">フォロー解除</button>
    </form>
@else
    <form action="{{ route('follow', ['user' => $user->id]) }}" method="POST">
        {{ csrf_field() }}
        <button type="submit" class="btn btn-primary">フォローする</button>
    </form>
@endif
</div>

 @endforeach
</table>




@endsection
