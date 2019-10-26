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
				<!-- ↑固有コンテンツ表示領域↑ -->




				<form action="confirmation.php" method="post"><br />  
		 			<input type="hidden" name="time" value="<?php echo '現在時刻は：'.date('Y/m/d H:i:s'); ?>" size="60">
		            <input type="submit" value="出勤" />
				</form>
				<form action="confirmation.php" method="post"><br />  
		 			<input type="hidden" name="time" value="<?php echo '現在時刻は：'.date('Y/m/d H:i:s'); ?>" size="60">
		            <input type="submit" value="退勤" />
				</form>



	        </div>
	    </div>
	    <label class="pure-overlay" for="pure-toggle-left" data-overlay="left"></label>
	</div>
<!-- ↑サイト表示領域とpure-drawer↑ -->
    <script>
    	// 曜日の取得↓
    	var now =new Date();
    	var youbi = now.getDay();
    	var weekday = ["（日）","（月）","（火）","（水）","（木）","（金）","（土）"];
		document.getElementById('youbi').textContent = weekday[youbi];

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
		    document.getElementById("clock").innerHTML = clock;
		}
       setInterval('setClock()', 1000);
    </script>
<!-- ↑時計表示用スクリプト↑ -->
<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
 </body>
 </html> 