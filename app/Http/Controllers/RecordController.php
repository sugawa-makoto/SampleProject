<?php

namespace App\Http\Controllers;
use App\Models\Working_days;
use App\Models\yasumi as yasumis;
use App\Models\calendar;
use DB; 
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use \Yasumi\Yasumi;//〜として。。
use Carbon\Carbon;

class RecordController extends Controller {

  public function index(){
    $carbon = Carbon::now();
    $carbon_year = $carbon->year; //今年（2019）しっかり更新されます
    $carbon_month = $carbon->month; //今月(11) しっかり更新されます

    $calendar = calendar::where('year',$carbon_year)->where('month',$carbon_month)->get();// 今月分の日数の羅列を取得しています。
    
    $working_days = working_days::where('user_id',Auth::id())->where('year',$carbon_year)->where('month',$carbon_month)->get();
    
    if($calendar->isEmpty()){
      // TODO 早期リターンで違うVIEWに飛ばす（データが見つかりません的な、４０４みたいな）
      return view('welcome');
    }
    $calendar_search = calendar::where('year',$carbon_year)->where('month',$carbon_month)->exists();
    
  
    
    
    return view('record',compact('calendar','working_days'));
    
  }
}