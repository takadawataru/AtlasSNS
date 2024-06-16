@extends('layouts.login')

@section('content')
<h2 class="page-header">アイコン一覧</h2>
@foreach($posts as $post)
<tr>
  <td><img src="{{asset('storage/'.$post->user->images)}}" alt=""></td>

</tr>

@endforeach





@foreach($posts as $post)
<tr>
  <td><a href="/post/{{$post->user->id}}/otherProfile"><img src="{{asset('storage/'.$post->user->images)}}" alt=""></a></td>
  <td>{{ $post->user->username}}</td>
  <td>{{ $post->post }}</td>
</tr>

@endforeach






@endsection
