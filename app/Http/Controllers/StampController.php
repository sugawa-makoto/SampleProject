<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;

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
	public function in(){
		dd("出勤ボタンが押されました");
	}
	public function out(){
		dd("退勤ボタンが押されました");
	}
	// コントローラのコンストラクターでmiddlewareメソッドを呼び出す（ログイン後でないとstampに行けない）
	public function __construct()
	{
		$this->middleware('auth');
	}
    
}
