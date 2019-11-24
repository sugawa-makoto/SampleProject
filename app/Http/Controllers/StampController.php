<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\Working_days;
use App\Models\Yasumi;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;
use DB;


class StampController extends Controller {
    public function stamp(){
    	date_default_timezone_set('Asia/Tokyo');
		$date2 = date("Y年m月d日");
		$time2 = date("H時i分s秒");
  		return view('stamp')->with([
		"date2" => $date2,
		"time2" => $time2,
		]);
	}
	// 出勤ボタン処理↓
	public function in(){
		$carbon = Carbon::now();
		$carbon_year = $carbon->year; //今年（2019）しっかり更新されます
		$carbon_month = $carbon->month; //今月(11) しっかり更新されます

		// 早期リターン
		$existsWorkingDays = working_days::where('user_id',Auth::id())->where('today',Carbon::today())->exists();
		if ($existsWorkingDays) {
			return redirect('/stamp')->with('flash_message', '出勤済みなので登録できません！');
		} 
		
		$formatted_date = Carbon::today()->format("y年m月d日");
		// テーブルを指定
		$record = new Working_days;
		$record->user_id = Auth::id();
		$record->start_time = Carbon::now();
		$record->today = Carbon::today();
		$record->year = $carbon_year;
		$record->month = $carbon_month;

		$record->save();
		return redirect('/stamp')->with('flash_message', '出勤が完了しました');
	}

	// 退勤ボタン処理↓
	public function out(){
		// １つしかデータが存在しないはずなので、１つだけ取得
		$workingDay = working_days::where('user_id',Auth::id())->where('today',Carbon::today())->first();
		
		// 出勤の打刻情報がない場合
		if (!$workingDay) {
			$record = new Working_days;
			$record->user_id = Auth::id();
			$record->end_time = Carbon::now();
			$record->today = Carbon::today();
			$record->save();
			return redirect('/stamp')->with('flash_message', 'お疲れさまでした');
		}
	
		// 退勤時間がある場合
		if ($workingDay->end_time) {
			return redirect('/stamp')->with('flash_message', '退勤済みなので登録できません！');
		}
		
		// ここまで来たら、出勤の打刻情報が存在するが、退勤時間がない場合
		$workingDay->end_time = Carbon::now();
		$workingDay->save();
		return redirect('/stamp')->with('flash_message', 'お疲れさまでした！！');
	}
	// コントローラのコンストラクターでmiddlewareメソッドを呼び出す（ログイン後でないとstampに行けない）
	public function __construct()
	{
		$this->middleware('auth');
	}
    
}
