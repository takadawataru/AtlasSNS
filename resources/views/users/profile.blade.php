@extends('layouts.login')

@section('content')
<form method="POST" action="/bbs" enctype="multipart/form-data">
    @csrf
    name:<br>
    <input type="text" value="{{ $user->username }}" class="input" name="name" >
    <br>
    mailaddress:<br>
    <input type="text" value="{{ $user->mail }}" class="input" name="mail">
    <br>
    password:<br>
    <input type="password" class="input" name="password" >
    <br>
    password confirm:<br>
     <input type="password" value="" class="input" name="password_confirmation">
    <br>
    bio:<br>
   <textarea type="text" name="bio" rows="2" value="{{ $user->bio }}" class="input"></textarea>

   icon image:<br>
        <input type="file" name="images">
        <input type="submit" value="更新">
         <img src="{{asset('storage/'.Auth::user()->images)}}" alt="">

    <br>

</form>




<tr>
                <td>{{ $user->id }}</td>
                <td>{{ $user->username }}</td>
</tr>


@endsection
