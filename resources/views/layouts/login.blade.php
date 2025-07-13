<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <!--IEブラウザ対策-->
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="description" content="ページの内容を表す文章" />
    <title></title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
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
        <div id = "" style="display:flex;justify-content: right;margin-right: 20px;">
            <h1><a href="/top"><img class="atlas_icon" src="{{asset('images/Atlas.png')}}"></a></h1>
                <div id="menu">
                    <div id="" style="display:flex;">
                        <div id="accordion" class="accordion-container">
                            <h4 class="accordion-title js-accordion-title">{{Auth::user()->username}}   さん</h4>
                            <div class="accordion-content">
                                <p class="side_text"><a href="/top" class="side_color">HOME</a></p>
                                <p class="side_text"><a href="/profile"  class="side_color">プロフィール</a></p>
                                <p class="side_text"><a href="/logout"  class="side_color">ログアウト</a></p>
                            </div>
                        </div>
                        <img src="{{asset('storage/'.Auth::user()->images)}}" alt="" class="header_icon">
                    </div>
                </div>
        </div>
    </header>
    <div id="row">
        <div id="container">
            @yield('content')
        </div >
            <div id="side-bar">
                <div id="confirm" style="margin-left: 20px;">
                    <p>{{Auth::user()->username}}さんの</p>
                <div style="display:flex;">
                    <p>フォロー数</p>
                    <p style="margin-left:40px;">{{ Auth::user()->follows()->get()->count() }}名</p>
                </div>
                    <p type="button" class="btn btn-primary" style="margin-left:60px;"><a href="/follow-list"class=btn-color>フォローリスト</a></p>
                <div style="display:flex;">
                    <p>フォロワー数</p>
                    <p style="margin-left:40px;">{{Auth::user()->followers()->get()->count() }}名</p>
                </div>
                    <p type="button" class="btn btn-primary" style="margin-left:50px;"><a href="/follower-list"class=btn-color>フォロワーリスト</a></p>
            <div>
            </div>
        </div>
        <hr class="cp_hr01" />
            <div>
                <p type="button" class="btn btn-primary" style="margin-left:50px;"><a href="/search"class=btn-color>ユーザー検索</a></p>
            </div>
    </div>
    <footer>
    </footer>
    <script src="JavaScriptファイルのURL"></script>
    <script src="JavaScriptファイルのURL"></script>
</body>
</html>
