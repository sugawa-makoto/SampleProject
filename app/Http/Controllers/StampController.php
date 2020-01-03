<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\Working_days;
use App\Models\Yasumi;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;
use DB;


use Illuminate\Http\Request;
use App\Models\Working_days;
// お試し↓
use Auth;
// お試し↓
use App\stamp;
// お試し↓
use Carbon\Carbon;



class StampController extends Controller {
    public function stamp(){
<<<<<<< HEAD
    	date_default_timezone_set('Asia/Tokyo');
		$date2 = date("Y年m月d日");
		$time2 = date("H時i分s秒");
  		return view('stamp')->with([
		"date2" => date("Y年m月d日"),
		"time2" => date("H時i分s秒"),
  		]);
	}


	// ~~~~~お試し
	public function punchIn()
    {
        $user = Auth::user();

        /**
         * 打刻は1日一回までにしたい 
         * DB
         */
        $oldTimestamp = Timestamp::where('user_id', $user->id)->latest()->first();
        if ($oldTimestamp) {
            $oldTimestampPunchIn = new Carbon($oldTimestamp->punchIn);
            $oldTimestampDay = $oldTimestampPunchIn->startOfDay();
    }

    $newTimestampDay = Carbon::today();
    /**
     * 日付を比較する。同日付の出勤打刻で、かつ直前のTimestampの退勤打刻がされていない場合エラーを吐き出す。
     */
    if (($oldTimestampDay == $newTimestampDay) && (empty($oldTimestamp->punchOut))){
        return redirect()->back()->with('error', 'すでに出勤打刻がされています');
    }

    $timestamp = Timestamp::create([
        'user_id' => $user->id,
        'punchIn' => Carbon::now(),
    ]);

    return redirect()->back()->with('my_status', '出勤打刻が完了しました');
    }

    public function punchOut()
    {
        $user = Auth::user();
        $timestamp = Timestamp::where('user_id', $user->id)->latest()->first();

        if( !empty($timestamp->punchOut)) {
            return redirect()->back()->with('error', '既に退勤の打刻がされているか、出勤打刻されていません');
        }
        $timestamp->update([
            'punchOut' => Carbon::now()
        ]);

        return redirect()->back()->with('my_status', '退勤打刻が完了しました');
    }
    // ~~~~~お試し
=======
		$carbon = Carbon::now();
        $carbon_year = $carbon->year; //今年
        $carbon_month = $carbon->month; //今月
		$carbon_day = $carbon->day;//今日
		$carbon_hour = $carbon->hour;//時
		$carbon_minute = $carbon->minute;//時
		$japan_time = $carbon_hour.':'.$carbon_minute;

		$carbon_date = Carbon::parse("$carbon_year-$carbon_month-$carbon_day");
		// 日本語ロケールをセット
		setlocale(LC_ALL, 'ja_JP.UTF-8');
		// これで「2019/01/01（火）」になります
		$dayOfWeek =  $carbon_date->formatLocalized('%m月%d日(%a)');

		if($carbon_minute < 10) {
			$japan_time = $carbon_hour.':'.'0'.$carbon_minute;
		}



		$date2 = $dayOfWeek;
		$time2 = $japan_time;
	
		return view('stamp',compact('date2','time2'));
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
    
>>>>>>> a573a90f11b0f00842e3701402bb2ac6ec92f4e1
}
