<<<<<<< HEAD
<!DOCTYPE html>
 <html>
 <head>
   <meta charset="utf-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <title>I/OM=>manager_stamp</title>
   <meta name="viewport" content="width=device-width,initial-scale=1">
   <link rel="stylesheet" href="css/record.css">
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
                </div>
                <!-- ↓固有コンテンツ表示領域↓ -->
                <div class="all_wrapper">
                
                <table>
                    @foreach($data as $d)
                    <tr>
                        <td>{{$d->user_id}}</td>
                        <td>{{$d->start_time}}</td>
                        <td>{{$d->end_time}}</td>
                        <td>{{$d->today}}</td>
                    </tr>
                    @endforeach
                    </table>
                </div>
                <!-- ↑固有コンテンツ表示領域↑ -->
            </div>
        </div>
        <label class="pure-overlay" for="pure-toggle-left" data-overlay="left"></label>
    </div>
<!-- ↑サイト表示領域とpure-drawer↑ -->
    <script>

    </script>
<!-- ↑時計表示用スクリプト↑ -->








<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
 </body>
 </html> 
=======
@extends('layouts.common')
<!-- cssの追加 -->
@section('css')

@endsection
<!-- コンテンツ領域 -->
@section('content')
<div class="all_wrapper_record">
	<table>
		<tr>
			<th>日付</th>
			<th>祝日</th>
			<th>出勤時間</th>
			<th>退勤時間</th>
		</tr>
		@foreach($calendar as $c)
		<tr>
			<td>{{$c->today_youbi}}</td>
			<!-- <td>{{$c->youbi}}</td> -->
			@foreach($yasumi as $y)
				@if($c->today === $y->yasumi_day)
					<td>{{$y->yasumi_name}}</td>
					@break
				@elseif($loop->last && $c->today !== $y->yasumi_day)
					<td></td>
				@endif
			@endforeach
			@foreach($working_days as $v)
				@if($c->today === $v->today)
					<td>{{$v->start_time}}</td>
					<td>{{$v->end_time}}</td>
					@break
				@elseif($loop->last && $v->today !== $c->today)
					<td></td>
					<td></td>
				@endif
			@endforeach
		</tr>
		@endforeach
	</table>
</div>
@endsection
>>>>>>> a573a90f11b0f00842e3701402bb2ac6ec92f4e1
