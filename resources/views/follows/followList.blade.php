@extends('layouts.login')

@section('content')
<div class=follow_group>
      <h2 class="page-header">follow List</h2>
  <div class=follow_icon>
    @foreach($followers as $follower)
      @if($follower->images!='icon1.png')
      <a href="/post/{{$follower->id}}/otherProfile"><img class="top_icon"  src="{{asset('storage/'.$follower->images)}}" alt=""></a>
      @else
      <a href="/post/{{$follower->id}}/otherProfile"><img class="top_icon" src="{{asset('images/icon1.png')}}" alt=""></a>
    @endif
    @endforeach
  </div>
</div>



<hr class="cp_hr01" />

<table class='table table-hover'>
  @foreach($posts as $post)
    <tbody class="top">
      @if($post->user->images!='icon1.png')
            <td><img src="{{asset('storage/'.$post->user->images)}}" alt=""></td>
            @else
            <td><img src="{{asset('images/icon1.png')}}" alt=""></td>
            @endif
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
