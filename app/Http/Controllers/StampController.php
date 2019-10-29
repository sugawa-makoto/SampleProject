<?php

namespace App\Http\Controllers;

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
}
