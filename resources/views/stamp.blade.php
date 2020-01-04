<<<<<<< HEAD
<!DOCTYPE html>
 <html>
 <head>
   <meta charset="utf-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <title>I/OM=>manager_stamp</title>
   <meta name="viewport" content="width=device-width,initial-scale=1">
   <link rel="stylesheet" href="css/stamp.css">
   <link rel="stylesheet" href="css/pure-drawer.css">
   <!-- <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous"> -->
 </head>
 <!-- ↑宣言関係↑ -->
 <body>
 <!-- ↓サイト表示領域とpure-drawer↓ -->
	<div class="pure-container" data-effect="pure-effect-slide">
    <input type="checkbox" id="pure-toggle-left" class="pure-toggle" data-toggle="left">
    <label class="pure-toggle-label" for="pure-toggle-left" data-toggle-label="left">
        <span class="pure-toggle-icon"></span>
    </label>

	    <div class="pure-drawer" data-position="left">
	        <!-- ↓pure-drawerハンバーガーメニューの中身↓ -->
			<div class="row collapse">
                <div class="large-12 columns">
                    <ul class="nav-primary">
                        <li><a href="/pure-drawer">Home</a></li>
                        <li><a href="/pure-drawer/documentation.html">修正</a></li>
                    </ul>
                </div>
            </div>
	        <!-- ↑pure-drawerハンバーガーメニューの中身↑ -->
	    </div>
	    <div class="pure-pusher-container">
	        <div class="pure-pusher">       
				<!-- ↓トップバーの内容↓ -->
	 		 	<div class="top_bar">
					<div class="top_bar_brand">I/O=>manager</div>
					<div class="top_bar_user">
						<div class="top_bar_user_photo"><img src="https://nekogazou.com/wp-content/uploads/2013/09/140.jpg"></div>
						<div class="top_bar_user_name">{{Auth::user()->name}}</div>
					</div>
				</div>
				<!-- ↓固有コンテンツ表示領域↓ -->	
			 	<div class="all_wrapper">
				 	<div class="wrapper_main">
						<div class="wrapper_day_time">
							<div class="wrapper_day_youbi">
								<div class="day"><h1>{{$date2}}</h1></div>
								<p id="youbi"></p>
							</div>
							<div id="clock"></div>
						</div>
							<div class="wrapper_select_button">
								<a href="#" class="btn-circle-border-simple_in">出勤</a>
								<a href="#" class="btn-circle-border-simple_out">退勤</a>
								<a href="#" class="btn-circle-border-simple_list">勤務実績</a>
							</div>
					</div>
				</div>


				<!-- ~~~~~~~~~~~~~お試し -->
				<div class="button-form">
                        <ul>
                            <li>
                                <form action="{{ route('stamp/punchin') }}" method="POST">
                                    @csrf
                                    @method('POST')
                                    <button type="submit" class="btn btn-primary">出勤</button>
                                </form>
                            </li>
                            <li>
                                <form action="{{ route('stamp/punchout') }}" method="POST">
                                    @csrf
                                    @method('POST')
                                    <button type="submit" class="btn btn-success">退勤</button>
                                </form>
                            </li>
                        </ul>
                    </div>
					<!-- ~~~~~~~~~~~~~お試し -->
				<!-- ↑固有コンテンツ表示領域↑ -->



				<!-- ~~~~~~~~~~~~~お試し -->
				<form action="confirmation.php" method="post"><br />  
		 			<input type="hidden" name="time" value="<?php echo '現在時刻は：'.date('Y/m/d H:i:s'); ?>" size="60">
		            <input type="submit" value="出勤" />
				</form>
				<form action="confirmation.php" method="post"><br />  
		 			<input type="hidden" name="time" value="<?php echo '現在時刻は：'.date('Y/m/d H:i:s'); ?>" size="60">
		            <input type="submit" value="退勤" />
				</form>
				<!-- ~~~~~~~~~~~~~お試し -->


	        </div>
	    </div>
	    <label class="pure-overlay" for="pure-toggle-left" data-overlay="left"></label>
=======
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
>>>>>>> a573a90f11b0f00842e3701402bb2ac6ec92f4e1
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

window.onload = function () { // ページ読み込み時に実行する無名関数
    document.getElementById("yasumi").click();
}
window.onload = function () { // ページ読み込み時に実行する無名関数
    document.getElementById("calendar").click();
}



</script>
@endsection
