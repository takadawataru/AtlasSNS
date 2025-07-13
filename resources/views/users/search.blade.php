@extends('layouts.login')

@section('content')

<div class="search_result">
    <form action="/search_result" method="POST" style ="padding-left:80px;">
        @CSRF
        <input type="search" name="username" placeholder="ユーザー名">
        <button type="submit" class="post_btn"><img class="search_icon" src="{{asset('images/search.png')}}"></button>
    </form>

    @if(!empty($search))
        <p style="margin-left:auto; margin-right:auto;">検索ワード：{{$search}}</p>
    @endif
</div>

<hr class="cp_hr01" />


<table>

@foreach ($users as $user)
    <tbody class="search_top">
        <tr>
            <td><img src="{{asset('storage/'.$user->images)}}" alt=""></td>
        </tr>
        <tr class="search_post">
            <td style="font-weight:bold";>{{$user ->username }}</td>
        </tr>

        <tr>
            <td>
            @if (Auth::user()->isFollowing($user->id))
                <form action="{{ route('un_follow', ['user' => $user->id]) }}" method="POST">
                    {{ csrf_field() }}
                    <button type="submit" class="btn btn-danger">フォロー解除</button>
                </form>
            @else
                <form action="{{ route('follow', ['user' => $user->id]) }}" method="POST">
                    {{ csrf_field() }}
                    <button type="submit" class="btn btn-info btn-color">フォローする</button>
                </form>
            @endif
            </td>
        </tr>
    </tbody>
@endforeach
</table>




@endsection
