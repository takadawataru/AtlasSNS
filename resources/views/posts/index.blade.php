@extends('layouts.login')

@section('content')
 <!--
  投稿フォームを設置する。
  formのurlを設定する
  web.phpに移動してコードを書く
  掛けたら、コントローラーにコードを書く。
 -->

<div class="container">
        {!! Form::open(['url' => 'post/create']) !!}
        <tr><td><img src="{{asset('storage/'.Auth::user()->images)}}" alt=""></td></tr>
            <tr class="form-group"><td>
                <textarea  name="newPost" class="tarea" placeholder="投稿内容を入力してください"></textarea></textarea></td>
                <!---->
            </tr>
                <td><tr><button type="submit" class="post_btn"><img class="post_icon" src="{{asset('images/post.png')}}"></button></tr></td>
        {!! Form::close() !!}
</div>

<hr class="cp_hr01" />


    <div>
        <table>
            @foreach ($posts as $posts)
            <tbody class="top">
                <tr>
                    <td><img  src="{{asset('storage/'.$posts->user->images)}}" alt=""></td>
                </tr>
                <tr class="post">
                    <td>{{ $posts->user->username}}</td><!--リレーションでuser.phpのusernameを置くことで情報が取得できる。 -->
                    <td class="posts">{!! nl2br(e($posts->post)) !!}</td>

                </tr>

                <tr class="content">
                    <td class="content_at">{{ $posts->created_at->format('Y-m-d H:i') }}</td>

                    <td><a class="js-modal-open" href="" post="{{ $posts->post }}" post_id="{{ $posts->id }}"><img class="icon" src="{{asset('images/edit.png')}}"></a></td>

                    <td><button class="btn-dust" href="/post/2/delete" onclick="return confirm('こちらの投稿を削除してもよろしいでしょうか？')"></button></td>
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
                <input type="submit" value="更新">
                {{ csrf_field() }}
           </form>
           <a class="js-modal-close" href="">閉じる</a>
        </div>
    </div>




@endsection
