@extends('layouts.login')

@section('content')
<p>他ユーザーのプロフィール</p>

 <div>
        <table class='table table-hover'>
            <tr>
                <th></th>
                <th>name</th>
                <th>bio</th>

            </tr>

            <tr>
                <td><img src="{{asset('storage/'.$user->images)}}" alt=""></td>
                <td>{{ $user->username}}</td>
                <td>{{ $user->bio}}</td>
            </tr>
                  <div class="content">
        </table>

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

      </div>


       <div>
        <h2 class="page-header">投稿一覧</h2>
        <table class='table table-hover'>
            <tr>
                <th></th>
                <th>投稿内容</th>
            </tr>
                 @foreach ($posts as $posts)
            <tr>
                <td><img src="{{asset('storage/'.$user->images)}}" alt=""></td>
                <td>{{ $posts->post }}</td>
            </tr>
                 @endforeach
        </table>
    </div>


@endsection
