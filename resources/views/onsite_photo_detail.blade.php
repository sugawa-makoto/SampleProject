@extends('layouts.common')
<!-- cssの追加 -->
@section('css')

@endsection
<!-- コンテンツ領域 -->
@section('content')
@foreach($image_url as $url)
					
<img src="https://sugawaapp.s3.ap-northeast-1.amazonaws.com/{{ $url->image_url }}">
										
@endforeach
@endsection
