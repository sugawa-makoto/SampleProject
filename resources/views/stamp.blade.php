<!DOCTYPE html>
 <html>
 <head>
   <meta charset="utf-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <title>I/OM=>manager_stamp</title>
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
			<!-- ↓サイト表示領域↓ -->
			 	<div class="all_wrapper">
				 	<div class="wrapper_main">
						<div class="wrapper_day_time">
							<div class="day"><h1>{{$date2}}</h1></div>
							<div id="clock"></div>
						</div>
							<div class="wrapper_select_button">
								<a href="#" class="btn-circle-border-simple_in">出勤</a>
								<a href="#" class="btn-circle-border-simple_out">退勤</a>
								<a href="#" class="btn-circle-border-simple_list">勤務実績</a>
							</div>
					</div>
				</div>
			<!-- ↑サイト表示領域↑ -->
	        </div>
	    </div>
	    <label class="pure-overlay" for="pure-toggle-left" data-overlay="left"></label>
	</div>
<!-- ↑サイト表示領域とpure-drawer↑ -->
    <script>
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