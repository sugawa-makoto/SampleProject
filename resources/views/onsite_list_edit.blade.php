@extends('layouts.common')
<!-- cssの追加 -->
@section('css')

@endsection
<!-- コンテンツ領域 -->
@section('content')
<h1>情報編集</h1>

<div class="row">
    <div class="col-sm-12">
        <a href="/onsite_list" class="btn btn-primary" style="margin:20px;">一覧に戻る</a>
    </div>
</div>

<!-- form -->
<form method="post" action="/onsite_list_update/{{$onsite_list->id}}">

    <div class="form-group">
        <label>天気</label>
        
        <input checked="checked" type="radio" name="weather" id="msr_02_radio01" value="{{$onsite_list->weather}}">
        <label for="msr_02_radio01">晴れ</label>


        <input type="radio" name="weather" id="msr_02_radio02" value="{{$onsite_list->weather}}">
        <label for="msr_02_radio02">曇り</label>


        <input type="radio" name="weather" id="msr_02_radio03" value="{{$onsite_list->temperature}}">
        <label for="msr_02_radio03">雨</label>
    </div>

    <div class="form-group">
        <label>温度</label>
        <input type="text" name="temperature" value="{{$onsite_list->temperature}}" class="form-control">
    </div>

    <div class="form-group">
        <label>湿度</label>
        <input type="text" name="humidity" value="{{$onsite_list->humidity}}" class="form-control">
    </div>

    <div class="form-group">
        <label>施工タイトル</label>
        <input type="text" name="work_title" value="{{$onsite_list->work_title}}" class="form-control">
    </div>

    <div class="form-group">
        <label>施工詳細</label>
        <input type="text" name="work_detail" value="{{$onsite_list->work_detail}}" class="form-control">
    </div>

    <div class="form-group">
        <label>人数</label>
        <input type="text" name="people" value="{{$onsite_list->people}}" class="form-control">
    </div>

    <input type="hidden" name="_token" value="{{csrf_token()}}">

    <input type="submit" value="更新" class="btn btn-primary">

</form>
@endsection