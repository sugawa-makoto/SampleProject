@extends('layouts.common')
<!-- cssの追加 -->

@section('css')

<style>
    h1 { font-size: 16px; }
    .form_wrap { padding: 10px; }
    .errors {
      width: 300px;
      font-size: 12px;
      color: #e95353;
      border: 1px solid #e95353;
      background-color: #f2dede;
    }
    .complete {
      padding-left: 10px;
      width: 290px;
      font-size: 12px;
      color: #2a88bd;
      border: 1px solid #2a88bd;
      background-color: #a6e1ec;
    }
</style>
@endsection
<!-- コンテンツ領域 -->
@section('content')
@if ($errors->any())
    <div class="errors">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
@isset ($status)
    <div class="complete">
        <p>データベースに記録しました！！</p>
    </div>
@endisset

<!-- フラッシュメッセージ -->
@if (session('flash_message'))
    <div class="flash_message">
        {{ session('flash_message') }}
    </div>
@endif
<div class="all_wrapper_onsite_work_input_details">
    <div class="wrapper_main_onsite_work_input_details">
        <div class="wrapper_form_onsite_work_input_details">
            <form method="post" action="" enctype="multipart/form-data">
            {{ csrf_field() }}
            <p>記入者</p>
            {{ Auth::user()->name }}
            <div class="msr_text_02">
                <label>現場名</label>
                <input type="text" name="onsite_name" placeholder="必須項目">
            </div>
            <div class="msr_radio_02">
                <p>天候  <選択必須></p>
                <input type="radio" name="weather" id="msr_02_radio01" value="晴れ">
                <label for="msr_02_radio01">晴れ</label>
                <input type="radio" name="weather" id="msr_02_radio02" value="曇り">
                <label for="msr_02_radio02">曇り</label>
                <input type="radio" name="weather" id="msr_02_radio03" value="雨">
                <label for="msr_02_radio03">雨</label>
            </div>
            <div class="msr_text_021">
                <label>温度</label>
                <input type="text" name="temperature" placeholder="必須項目">℃
            </div>
            <div class="msr_text_021">
                <label>湿度</label>
                <input type="text" name="humidity" placeholder="必須項目">%
            </div>
            <div class="msr_text_02">
                <label>施工タイトル</label>
                <input type="text" name="work_title" placeholder="必須項目">
            </div>
            <div class="msr_textarea_02">
                <label>施工詳細</label>
                <textarea name="work_detail" placeholder="必須項目"></textarea>
            </div>
            <div class="msr_text_021">
                <label>作業人数</label>
                <input type="text" name="people" placeholder="必須項目">人
            </div>
            <!-- <div class="msr_file_02">
                <p>file</p>
                <div class="msr_filebox_02">
                <label for="file_photo">画像を選択してください</label>
                <input type="file" name="file">
                </div>
            </div> -->
            <input type="file" name="file[]" multiple>
            <p class="msr_sendbtn_02">
                <input type="submit" value="Send">
            </p>
            </form>
        </div>
    </div>
</div>





@endsection