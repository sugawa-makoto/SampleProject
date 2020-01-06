@extends('layouts.common')
<!-- cssの追加 -->
@section('css')
<link rel="stylesheet" href="css/all.css">
@endsection
<!-- コンテンツ領域 -->
@section('content')
<div class="stamp_all_wrapper">
	<div class="setting">
		<form action="{{ url('/calendar_update')}}" method="POST" class="form-horizontal">
			{{ csrf_field() }}
			<button type="submit" name="add" class="btn_circle_red" id="calendar">
				カレンダー更新（仮）
			</button>
		</form>
		<form action="{{ url('/yasumi')}}" method="POST" class="form-horizontal">
			{{ csrf_field() }}
			<button type="submit" name="add" class="btn_circle_blue" id="yasumi">
				祝日更新（仮）
			</button>
		</form>
	</div>
	<!-- フラッシュメッセージ -->
	<div class="stamp_flash_message_wrapper">
		@if (session('flash_message'))
			<div id='hideMe'>
				{{ session('flash_message') }}
			</div>
		@endif
	</div>
	<div class="wrapper_main">
		<div class="wrapper_day_time">
			<div class="wrapper_day_youbi">
				<div class="day">{{$date2}}</div>
				
			</div>
			<div id="clock">{{$time2}}</div>
		</div>
		<div class="wrapper_select_button">
			<form action="{{ url('/stamp_in')}}" method="POST">
				{{ csrf_field() }}
				<!-- <textarea type="hiddon" rows="6" name="message"></textarea> -->
				<button type="submit" name="add" class="btn_circle_blue">
					出勤
				</button>
			</form>
			<form action="{{ url('/stamp_out')}}" method="POST">
				{{ csrf_field() }}
				<!-- <textarea type="hiddon" rows="6" name="message"></textarea> -->
				<button type="submit" name="add" class="btn_circle_red">
					退勤
				</button>
			</form>
			<a href="/record" class="btn_circle_orange">勤務実績</a>
		</div>
	</div>
</div>
@endsection
<!-- script領域 -->
@section('script')
<script>
window.onload = function()
{
Time = new Date();
M = Time.getSeconds(); //現在の分を取得、変数Mに代入
Rest = ((60 - M)) * 1000; //ここがその残り時間(ミリ秒)を計算する処理

setTimeout(function(){
location.reload(true)
}, Rest);
}
</script>
@endsection
