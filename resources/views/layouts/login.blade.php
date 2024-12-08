<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8" />
    <!--IEブラウザ対策-->
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="description" content="ページの内容を表す文章" />
    <title></title>
    <link rel="stylesheet" href="{{ asset('css/reset.css') }} ">
    <link rel="stylesheet" href="{{ asset('css/style.css') }} ">
    <!--スマホ,タブレット対応-->
    <meta name="viewport" content="width=device-width,initial-scale=1" />
    <!--サイトのアイコン指定-->
    <link rel="icon" href="画像URL" sizes="16x16" type="image/png" />
    <link rel="icon" href="画像URL" sizes="32x32" type="image/png" />
    <link rel="icon" href="画像URL" sizes="48x48" type="image/png" />
    <link rel="icon" href="画像URL" sizes="62x62" type="image/png" />
    <!--iphoneのアプリアイコン指定-->
    <link rel="apple-touch-icon-precomposed" href="画像のURL" />
    <!--OGPタグ/twitterカード-->
    <!-- javascript追加 -->
<script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
<script type="text/javascript" src="{{ asset('js/script.js')}}"></script>
</head>
<body>
    <header>
        <div id = "">
        <h1><a href="/top"><img src="{{asset('images/Atlas.png')}}"></a></h1>
            <div id="menu">
                <div id="">
                    <label>{{Auth::user()->username}}さん</label>
                    <img src="{{asset('storage/'.Auth::user()->images)}}" alt="">

                   <div id="accordion" class="accordion-container">
                      <h4 class="accordion-title js-accordion-title">{{Auth::user()->username}}さん</h4>

                     <div class="accordion-content">
                         <p><a href="/top">ホーム</a></p>
                         <p><a href="/profile">プロフィール</a></p>
                         <p><a href="/logout">ログアウト</a></p>
                     </div>
                   </div>
                </div>
            </div>
        </div>
    </header>
    <div id="row">
        <div id="container">
            @yield('content')
        </div >
        <div id="side-bar">
            <div id="confirm">
                <p>{{Auth::user()->username}}さんの</p>
                <div>
                <p>フォロー数</p>
                <p>{{ Auth::user()->follows()->get()->count() }}名</p>
                </div>
                <p class="btn-btn-success-pull-right-blue"><a href="/follow-list">フォローリスト</a></p>
                <div>
                <p>フォロワー数</p>
                <p>{{Auth::user()->followers()->get()->count() }}名</p>
                </div>
               <p class="btn-btn-success-pull-right-blue"><a href="/follower-list">フォロワーリスト</a></p>
            </div>
             <p class="btn-btn-success-pull-right-blue"><a href="/search">ユーザー検索</a></p>
        </div>
    </div>
    <footer>
    </footer>
    <script src="JavaScriptファイルのURL"></script>
    <script src="JavaScriptファイルのURL"></script>
</body>
</html>
