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
    	// 曜日の取得↓
    	// var now =new Date();
    	// var youbi = now.getDay();
    	// var weekday = ["（日）","（月）","（火）","（水）","（木）","（金）","（土）"];
		// document.getElementById('youbi').textContent = weekday[youbi];

		// 年月日取得の処理↓
    	function set2digits(number) {
		    if (number < 10) {
		        return '0' + number;
		    }
		    return number;
		}
		function setClock() {
		    var nowTime = new Date();
		    var nowHour = set2digits(nowTime.getHours());
		    var nowMin  = set2digits(nowTime.getMinutes());
		    var nowSec  = set2digits(nowTime.getSeconds());
		    var clock   = "<h1 class='size'>" + nowHour + ":" + nowMin + "</h1>";
		    // document.getElementById("clock").innerHTML = clock;
		}
       setInterval('setClock()', 1000);


// // reloadの基本的な使い方
// function doReload() {
 
//  // reloadメソッドによりページをリロード
//  window.location.reload();
// }

// window.addEventListener('load', function () {

//  // ページ表示完了した3秒後にリロード
//  setTimeout(doReload, 10000);
// });


// var score = 90;

// if (score >= 80) {
// document.write("合格です！おめでとうございます！");
// }


// window.onload = function () { // ページ読み込み時に実行する無名関数
//     document.getElementById( "calendar" ).click();
// }
// window.onload = function () { // ページ読み込み時に実行する無名関数
//     document.getElementById( "yasumi" ).click();
// }


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
