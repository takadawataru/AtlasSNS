@extends('layouts.login')

@section('content')
 <!--
  投稿フォームを設置する。
  formのurlを設定する
  web.phpに移動してコードを書く
  掛けたら、コントローラーにコードを書く。
 -->

@if($errors->any())
        <div class="alert alert-danger">
        <ul>
            @foreach($errors->all() as $error)
            <li>{{ $error }}</li>
            @endforeach
        </ul>
        </div>
    @endif
<div class="container">
        {!! Form::open(['url' => 'post/create']) !!}

        @if(Auth::user()->images!='icon1.png')
            <td></td><img class="top_icon" src="{{asset('storage/'.Auth::user()->images)}}" alt=""></td>
            @else
            <td></td><img class="top_icon" src="{{asset('images/icon1.png')}}" alt=""></td>
            @endif
            <tr class="form-group"><td>
                <textarea  name="newPost" class="tarea" placeholder="投稿内容を入力してください"></textarea></textarea></td>
                <!---->
            </tr>
                <td><tr><button type="submit" class="post_btn"><img class="post_icon" src="{{asset('images/post.png')}}"></button></tr></td>
        {!! Form::close() !!}
</div>

<hr class="cp_hr01" />


    <div>
        <table >
            @foreach ($posts as $posts)
            <tbody class="top">
                <tr>
                @if($posts->user->images!='icon1.png')
                    <td><img class="top_icon" src="{{asset('storage/'.$posts->user->images)}}" alt=""></td>
                @else
                    <td><img class="top_icon" src="{{asset('images/icon1.png')}}" alt=""></td>
                @endif
                </tr>
                <!-- </tr> -->
                <tr class="post">
                    <td>{{ $posts->user->username}}</td><!--リレーションでuser.phpのusernameを置くことで情報が取得できる。 -->
                    <td class="posts">{!! nl2br(e($posts->post)) !!}</td>
                </tr>

                <tr class="content">
                    <td class="content_at">{{ $posts->created_at->format('Y-m-d H:i') }}</td>

                @if (Auth::user()->id== $posts->user_id)
                    <td><a class="js-modal-open" href="" post="{{ $posts->post }}" post_id="{{ $posts->id }}"><img class="icon" src="{{asset('images/edit.png')}}"></a></td>

                    <td><button class="btn-dust" href="/post/2/delete" onclick="return confirm('こちらの投稿を削除してもよろしいでしょうか？')"></button></td>
                @endif
                </tr>

            </tbody>
            @endforeach
        </table>
    </div>


<!-- モーダルの中身 -->
    <div class="modal js-modal ">
        <div class="modal__bg js-modal-close"></div>
        <div class="modal__content">

         <form action='post/edit' method="POST" >
            @csrf
                <textarea name="upPost" class="modal_post"></textarea>
                <input type="hidden" name="id" class="modal_id" value="">
                <button input type="submit" value="更新"><img src="{{asset('images/edit.png')}}" alt=""> </button>
                {{ csrf_field() }}
           </form>
        </div>
    </div>




@endsection
