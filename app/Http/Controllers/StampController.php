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
	public function in(){
		// テーブルを指定
		$record = new Working_days;
		$record->user_id = Auth::id();
		$record->start_time = Carbon::now();
		// $record->end_time = "2019-11-02 18:00:00";
		$record->today = Carbon::today();
	
		
		$record->save();
		// dd($p);
		return redirect('/stamp');
	}
	public function out(){
		// テーブルを指定
		$record = new Working_days;
		// $record->user_id = Auth::id();
		// $record->start_time = "2019-11-02 10:00:00";
		// $record->end_time = "2019-11-02 18:00:00";
		$record->today = Carbon::today();
		

		$p = working_days::where('today', '=', $record->today)->latest()->first()->id;
		$update = working_days::find($p);
		$update->end_time = Carbon::now();
		$update->save();
		return redirect('/stamp')->with('flash_message', '投稿が完了しました');
		// dd($flight);
		// return redirect('/stamp');
		// dd("退勤ボタンが押されました");
	}
	// コントローラのコンストラクターでmiddlewareメソッドを呼び出す（ログイン後でないとstampに行けない）
	public function __construct()
	{
		$this->middleware('auth');
	}
    
}
