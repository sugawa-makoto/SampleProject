<!DOCTYPE html>
 <html>
 <head>
   <meta charset="utf-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <title>I/OM=>manager_stamp</title>
   <meta name="viewport" content="width=device-width,initial-scale=1">
   <link rel="stylesheet" href="css/stamp.css">
   <link rel="stylesheet" href="css/onsite_work_input_details.css">
   <link rel="stylesheet" href="css/pure-drawer.css">
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.css">
   <!-- <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous"> -->
   <style>
    h1 { font-size: 16px; }
    .form_wrap { padding: 10px; }
    .errors {
      width: 300px;
      font-size: 12px;
      color: #e95353;
      border: 1px solid #e95353;
      background-color: #f2dede;
    }
    .complete {
      padding-left: 10px;
      width: 290px;
      font-size: 12px;
      color: #2a88bd;
      border: 1px solid #2a88bd;
      background-color: #a6e1ec;
    }
  </style>
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
                        <li><a href="/home">Home</a></li>
                        <li><a href="/stamp">修正</a></li>
						<li><a href="/onsite_select">現場管理</a></li>
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
                @if ($errors->any())
                <div class="errors">
                    <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                    </ul>
                </div>
                @endif
                @isset ($status)
                <div class="complete">
                    <p>データベースに記録しました！！</p>
                </div>
                @endisset

                        <!-- フラッシュメッセージ -->
                @if (session('flash_message'))
                    <div class="flash_message">
                        {{ session('flash_message') }}
                    </div>
                @endif
                <div class="all_wrapper_onsite_work_input_details">
				 	<div class="wrapper_main_onsite_work_input_details">
						<div class="wrapper_form_onsite_work_input_details">
                            <form method="post" action="" enctype="multipart/form-data">
                            {{ csrf_field() }}
                            <p>記入者</p>
                            {{ Auth::user()->name }}
                            <div class="msr_text_02">
                                <label>現場名</label>
                                <input type="text" name="onsite_name" placeholder="必須項目">
                            </div>
                            <div class="msr_radio_02">
                                <p>天候  <選択必須></p>
                                <input type="radio" name="weather" id="msr_02_radio01" value="晴れ">
                                <label for="msr_02_radio01">晴れ</label>
                                <input type="radio" name="weather" id="msr_02_radio02" value="曇り">
                                <label for="msr_02_radio02">曇り</label>
                                <input type="radio" name="weather" id="msr_02_radio03" value="雨">
                                <label for="msr_02_radio03">雨</label>
                            </div>
                            <div class="msr_text_021">
                                <label>温度</label>
                                <input type="text" name="temperature" placeholder="必須項目">℃
                            </div>
                            <div class="msr_text_021">
                                <label>湿度</label>
                                <input type="text" name="humidity" placeholder="必須項目">%
                            </div>
                            <div class="msr_text_02">
                                <label>施工タイトル</label>
                                <input type="text" name="work_title" placeholder="必須項目">
                            </div>
                            <div class="msr_textarea_02">
                                <label>施工詳細</label>
                                <textarea name="work_detail" placeholder="必須項目"></textarea>
                            </div>
                            <div class="msr_text_021">
                                <label>作業人数</label>
                                <input type="text" name="people" placeholder="必須項目">人
                            </div>
                            <!-- <div class="msr_file_02">
                                <p>file</p>
                                <div class="msr_filebox_02">
                                <label for="file_photo">画像を選択してください</label>
                                <input type="file" name="file">
                                </div>
                            </div> -->
                            <p class="msr_sendbtn_02">
                                <input type="submit" value="Send">
                            </p>
                            </form>
                            <form action="/upload" method="post" enctype="multipart/form-data">
                                {{ csrf_field() }}
                                <input type="file" name="file[]" multiple>
                                <p class="msr_sendbtn_02">
                                    <input type="submit" value="Send">
                                </p>
                            </form>
						</div>
					</div>
				</div>                

				<!-- ↑固有コンテンツ表示領域↑ -->
	        </div>
	    </div>
	    <label class="pure-overlay" for="pure-toggle-left" data-overlay="left"></label>
	</div>
<!-- ↑サイト表示領域とpure-drawer↑ -->
<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
 </body>
 </html> 