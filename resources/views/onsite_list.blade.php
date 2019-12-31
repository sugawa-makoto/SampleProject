@extends('layouts.common')
<!-- cssの追加 -->
@section('css')

@endsection
<!-- コンテンツ領域 -->
@section('content')
<div class="all_wrapper_onsite_list">
    <table>
        <thead class="head">
            <tr>
                <th>日付</th>
                <th>現場名</th>
                <th>天気</th>
                <th>温度</th>
                <th>湿度</th>
                <th>施工タイトル</th>
                <th>施工詳細</th>
                <th>人数</th>
                <th>詳細</th>
                <th>編集</th>
                <th>削除</th>
            </tr>
        </thead>
        <tbody>
            @foreach($data as $d)
                <tr>
                    <td class="created_at">{{ Carbon\Carbon::parse($d->created_at)->formatLocalized("%Y年%m月%d日")}}</td>
                    <td class="onsite_name">{{$d->onsite_name}}</td>
                    <td class="weather">{{$d->weather}}</td>
                    <td class="temperature">{{$d->temperature}}</td>
                    <td class="humidity">{{$d->humidity}}</td>
                    <td class="work_title">{{$d->work_title}}</td>
                    <td class="work_detail">{{$d->work_detail}}</td>
                    <td class="people">{{$d->people}}</td>
                    <td><a href="/onsite_list_show/{{$d->id}}" class="btn btn-primary btn-sm">詳細</a></td>
                    <td><a href="/onsite_list_edit/{{$d->id}}" class="btn btn-primary btn-sm">編集</a></td>
                    <td>
                        <form method="post" action="/onsite_list_delete/{{$d->id}}">
                        {{ csrf_field() }}
                        <input type="submit" value="削除" class="btn btn-danger btn-sm" onclick='return confirm("本当に削除しますか？");'>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection





















