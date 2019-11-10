<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\Working_days;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;

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
		// 早期リターン
		$existsWorkingDays = working_days::where('user_id',Auth::id())->where('today',Carbon::today())->exists();
		if ($existsWorkingDays) {
			return redirect('/stamp')->with('flash_message', '出勤済みなので登録できません！');
		} 

		// テーブルを指定
		$record = new Working_days;
		$record->user_id = Auth::id();
		$record->start_time = Carbon::now();
		$record->today = Carbon::today();
		
		$record->save();
		return redirect('/stamp')->with('flash_message', '出勤が完了しました');
	}



	// 退勤ボタン処理↓
	public function out(){
		// 早期リターン
		$existsWorkingDays = working_days::where('user_id',Auth::id())->where('today',Carbon::today())->whereNotNull('end_time')->exists();
		if ($existsWorkingDays) {
			return redirect('/stamp')->with('flash_message', '退勤済みなので登録できません！');
		} 

		// 出勤の打刻情報がある場合
		$workingDay = working_days::where('user_id',Auth::id())->where('today',Carbon::today())->first();
		if ($workingDay) {
		// 出勤時にend_timeカラムがnullable()になっているので更新してあげます↓
		$workingDay->end_time = Carbon::now();
		$workingDay->save();
		return redirect('/stamp')->with('flash_message', 'お疲れさまでした！！');
		}
		
		
		// 出勤の打刻情報がない場合（trueでない時）
		$record = new Working_days;
		$record->user_id = Auth::id();
		// $record->start_time = "2019-11-02 10:00:00";
		$record->end_time = Carbon::now();
		$record->today = Carbon::today();
		$record->save();
		return redirect('/stamp')->with('flash_message', 'お疲れさまでした');
		

	}
	// コントローラのコンストラクターでmiddlewareメソッドを呼び出す（ログイン後でないとstampに行けない）
	public function __construct()
	{
		$this->middleware('auth');
	}
    
}
