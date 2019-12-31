<!DOCTYPE html>
 <html>
 <head>
   <meta charset="utf-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <title>I/OM=>manager_stamp</title>
   <meta name="viewport" content="width=device-width,initial-scale=1">
   @yield('css')
   <link rel="stylesheet" href="css/all.css">
   <link rel="stylesheet" href="css/pure-drawer.css">
   @yield('style')
 </head>
 <!-- ↑宣言関係↑ -->
 <body>
 <!-- ↓サイト表示領域とpure-drawer↓ -->
	<div class="pure-container" data-effect="pure-effect-slide">
		<input type="checkbox" id="pure-toggle-left" class="pure-toggle" data-toggle="left">
		<div class="pure">
			<label class="pure-toggle-label" for="pure-toggle-left" data-toggle-label="left">
				<span class="pure-toggle-icon"></span>
			</label>
		</div>
	    <div class="pure-drawer" data-position="left">
	        <!-- ↓pure-drawerハンバーガーメニューの中身↓ -->
			<div class="row collapse">
                <div class="large-12 columns">
                    <ul class="nav-primary">
                        <!-- メニュー一覧↓ -->
                        <li><a href="/home">Home</a></li>
                        <li><a href="/stamp">修正</a></li>
						<li><a href="/onsite_select">現場管理</a></li>
						<li><a href="/onsite_photo_list">現場写真</a></li>
                        <!-- メニュー一覧↑ -->
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
						<div class="login_user_title">現在のログインユーザー</div>
						<div class="top_bar_user_name">{{Auth::user()->name}}<span class="sama">様</span></div>
					</div>
				</div>

                <!-- ↓固有コンテンツ表示領域↓ -->
                
                @yield('content')

				<!-- ↑固有コンテンツ表示領域↑ -->
	        </div>
	    </div>
	    <label class="pure-overlay" for="pure-toggle-left" data-overlay="left"></label>
	</div>
<!-- ↑サイト表示領域とpure-drawer↑ -->
@yield('script')
<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
 </body>
 </html> 