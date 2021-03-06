<?php

namespace App\Http\Controllers;
use App\Models\Working_days;
use App\Models\view_working_days;
use App\Models\calendar;
use App\Models\yasumi as yasumis;
use DB; 
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use \Yasumi\Yasumi;
use Carbon\Carbon;

class RecordController extends Controller {

  public function index(){
    $carbon = Carbon::now();
        $carbon_year = $carbon->year; //今年
        $carbon_month = $carbon->month; //今月
        $carbon_day = $carbon->day;//今日
        $carbon_today = Carbon::today();//今日は何年何月何日
        $carbon_several_days = $carbon->daysInMonth;//今月の日数
        $i=1;

    $calendar = calendar::where('year',$carbon_year)->where('month',$carbon_month)->get();// 今月分の日数の羅列を取得しています。
    $login_user_id = Auth::id();
    $working_days = working_days::where('year',$carbon_year)->where('month',$carbon_month)->where('user_id',$login_user_id)->get();
    $yasumi = \DB::table('yasumi')->get();
    


    if($calendar->isEmpty()){
      // TODO 早期リターンで違うVIEWに飛ばす（データが見つかりません的な、４０４みたいな）
      return view('welcome');
    }
    return view('record',compact('calendar', 'working_days', 'yasumi'));
  }
}