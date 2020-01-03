@extends('layouts.common')
<!-- cssの追加 -->
@section('css')

@endsection
<!-- コンテンツ領域 -->
@section('content')
<div class="wrapper_photos_all">
	@foreach($onsites as $onsite)
		@if(isset( $onsite->photos ))
		<div class="wrapper_photos">
			<!-- 以下aタグは一覧ページの１カードずつのURLを作っている -->
			<a class="photo_link" href="/onsite{{$onsite->id}}">
				@if($onsite->photos->first())
					<img class="onsite_photo" src="https://sugawaapp.s3.ap-northeast-1.amazonaws.com/{{$onsite->photos->first()->image_url}}">
				@endif
				{{ $onsite->onsite_name }}
			</a>
		</div>
		@endif
	@endforeach
</div>
@endsection