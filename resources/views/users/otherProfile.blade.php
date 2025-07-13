@extends('layouts.login')

@section('content')

<div style="display:flex;padding-left:100px;padding-top: 30px;">
    <div><img src="{{asset('storage/'.$user->images)}}" alt=""></div>
    <table class='table table-hover'>
        <tr>
            <th>name</th>
            <td>{{ $user->username}}</td>
        </tr>

        <tr >
            <th>bio</th>
            <td>{{ $user->bio}}</td>
        </tr>
    </table>
    <div class="other_content">
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

<hr class="cp_hr01" />


<div style="display:flex;border-bottom: 2px solid #e0e0e0;">
    <table class='table table-hover'>
        @foreach ($posts as $posts)
        <tbody class="other_top">
            <tr>
                <td><img  src="{{asset('storage/'.$posts->user->images)}}" alt=""></td>
            </tr>

            <tr class="post">
                <td>{{ $user->username}}</td>
                <td class="posts">{{ $posts->post }}</td>
            </tr>
            <tr class="content">
                <td class="content_at">{{ $posts->created_at->format('Y-m-d H:i') }}</td>
            </tr>
        </tbody>
        @endforeach
    </table>
</div>


@endsection
