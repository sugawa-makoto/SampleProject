@extends('layouts.common')
<!-- cssの追加 -->
@section('css')
<link rel="stylesheet" href="css/all.css">
@endsection
<!-- コンテンツ領域 -->
@section('content')
<div class="all_wrapper_top">
    <div class="wrapper_main_top">
        <div class="wrapper_contents">
            <div class="wrapper_brand">
                <h1>Welcome to</h1>
                <h2>I/O=>manager</h2>
            </div>
            <div class="wrapper_button">
                <div class="wrapper_button_login"><a href="http://127.0.0.1:8000/login" class="btn-gradient-flat_login">ログイン</a></div>
                <div class="wrapper_button_sign_up"><a href="http://127.0.0.1:8000/register" class="btn-gradient-flat_sign_up">新規登録</a></div>
            </div>
        </div>
    </div>
</div>
@endsection