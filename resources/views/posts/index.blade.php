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
        <div class="form-group">
            {!! Form::input('text', 'newPost', null, ['required', 'class' => 'form-control', 'placeholder' => '投稿内容']) !!}
            <!---->
        </div>
        <button type="submit" class="btn btn-success pull-right">追加</button>
        {!! Form::close() !!}
 </div>

<body class="container">

    <div>
        <h2 class="page-header">投稿一覧</h2>
        <table class='table table-hover'>
            <tr>
                <th></th>
                <th>投稿内容</th>

                <th>投稿日時</th>
                <th>投稿者</th>
            </tr>
            @foreach ($posts as $posts)
            <tr>
                <td><img src="{{asset('storage/'.$posts->user->images)}}" alt=""></td>
                <td>{{ $posts->post }}</td>
                <td>{{ $posts->created_at }}</td>
                <td>{{ $posts->user->username}}</td> <!--リレーションでuser.phpのusernameを置くことでで情報が取得できる。 -->

                  <div class="content">
        <!-- 投稿の編集ボタン -->
        <td><a class="js-modal-open" href="" post="{{ $posts->post }}" post_id="{{ $posts->id }}">編集</a></td>
    </div>

                 <td><a class="btn btn-danger" href="/post/{{$posts->id}}/delete" onclick="return confirm('こちらの投稿を削除してもよろしいでしょうか？')">削除</a></td>
            </tr>

            @endforeach
        </table>
    </div>
    <footer>

</body>

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
