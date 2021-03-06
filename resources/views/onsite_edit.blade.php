@extends('layouts.common')
<!-- cssの追加 -->
@section('css')

@endsection
<!-- コンテンツ領域 -->
@section('content')
<div class="row">
    <div class="col-sm-12">
        <a href="/onsite_list" class="btn_square_blue" style="margin:20px;">一覧に戻る</a>
    </div>
</div>

<!-- form -->
<div class="onsite_edit_center">
    <form method="post" action="/onsite_list_update/{{$onsite_list->id}}">
        <div class="msr_radio_02">
            <p>天候</p>
            <input type="radio" name="weather" id="msr_02_radio01" value="晴れ" @if ($onsite_list->weather == '晴れ') checked @endif>
            <label for="msr_02_radio01">晴れ</label>
            <!-- @if ($onsite_list->weather == '晴れ') checked @endifの記述で例えば、編集前：晴れなら編集画面の初期値を晴れにチェックしておく。
            valueの値はラジオボタンの内容を伝える要素。失敗した事例：value="$onsite_list->weather"にしたら編集前の値が入って送信されて更新が効かなかった。
            なのでしっかり、晴れ、曇、雨で分けたら対応可となった。 -->
            <input type="radio" name="weather" id="msr_02_radio02" value="曇り" @if ($onsite_list->weather == '曇り') checked @endif>
            <label for="msr_02_radio02">曇り</label>
            <input type="radio" name="weather" id="msr_02_radio03" value="雨" @if ($onsite_list->weather == '雨') checked @endif>
            <label for="msr_02_radio03">雨</label>
        </div>
        <div class="msr_text_021">
            <label>温度</label>
            <input type="text" name="temperature" value="{{$onsite_list->temperature}}" class="form-control">
        </div>
        <div class="msr_text_021">
            <label>湿度</label>
            <input type="text" name="humidity" value="{{$onsite_list->humidity}}" class="form-control">
        </div>
        <div class="msr_text_02">
            <label>施工タイトル</label>
            <input type="text" name="work_title" value="{{$onsite_list->work_title}}" class="form-control">
        </div>
        <div class="msr_textarea_02">
            <label>施工詳細</label>
            <input type="text" name="work_detail" value="{{$onsite_list->work_detail}}" class="form-control">
        </div>
        <div class="msr_text_021">
            <label>人数</label>
            <input type="text" name="people" value="{{$onsite_list->people}}" class="form-control">
        </div>
        <input type="hidden" name="_token" value="{{csrf_token()}}">
        <input type="submit" value="更新" class="btn btn-primary">
    </form>
</div>
@endsection