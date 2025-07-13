@extends('layouts.login')


@section('content')

<div class=follow_group>
      <h2 class="page-header">Follower List</h2>
  <div class=follow_icon>
    @foreach($posts as $post)
      <a href="/post/{{$post->user->id}}/otherProfile"><img src="{{asset('storage/'.$post->user->images)}}" alt=""></a>
    @endforeach
  </div>
</div>

<hr class="cp_hr01" />

<table class='table table-hover'>
  @foreach($posts as $post)
    <tbody class="top">

      <tr>
        <td><a href="/otherProfile"><img src="{{asset('storage/'.$post->user->images)}}" alt=""></a></td>
      </tr>
      <tr class="post" >
        <td>{{ $post->user->username}}</td>
        <td>{!! nl2br(e($post->post)) !!}</td>
      </tr>
      <tr class="content">
        <td class="content_at">{{ $post->created_at->format('Y-m-d H:i') }}</td>
      </tr>
    </tbody>
  @endforeach
</table>



@endsection
