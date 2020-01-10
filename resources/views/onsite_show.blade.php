@extends('layouts.common')
<!-- cssの追加 -->
@section('css')

@endsection
<!-- コンテンツ領域 -->
@section('content')
<div class="panel panel-default">
    <div class="panel-heading">
        現場名:{{ $onsute_show->onsite_name }}
    </div>
    <div class="panel-body">
        天気: {{ $onsute_show->weather }}
    </div>
    <div class="panel-body">
        温度: {{ $onsute_show->temperature }}
    </div>
    <div class="panel-body">
        湿度: {{ $onsute_show->humidity }}
    </div>
    <div class="panel-body">
        タイトル: {{ $onsute_show->work_title }}
    </div>
    <div class="panel-body">
        人数: {{ $onsute_show->people }}
    </div>
    <div class="panel-body">
        詳細: {{ $onsute_show->work_detail }}
    </div>
</div>
@endsection