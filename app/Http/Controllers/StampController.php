<?php

namespace App\Http\Controllers;

class StampController extends Controller {
    public function stamp(){
    	date_default_timezone_set('Asia/Tokyo');
		$date2 = date("Y年m月d日");
		$time2 = date("H時i分s秒");
  		return view('stamp')->with([
		"date2" => date("Y年m月d日"),
		"time2" => date("H時i分s秒"),
  		]);
    }
    
}
