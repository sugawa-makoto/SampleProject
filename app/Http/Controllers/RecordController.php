<?php

namespace App\Http\Controllers;
<<<<<<< HEAD

use Illuminate\Http\Request;
use App\Models\Working_days;
// お試し↓
use Auth;
// お試し↓
use App\stamp;
// お試し↓
use Carbon\Carbon;


class RecordController extends Controller {
    public function model()
    {
      // Working_daysモデルのインスタンス化
      $md = new Working_days();
      // データ取得
      $data = $md->getData();
  
      // ビューを返す
      return view('record', ['data' => $data]);
    }

    








    // public function record(){

    //     //月初から月末の間をforeach
    //     $data = ["りんご","概ね赤","2019年"];
    //     // recordと$dataを持ってbladeに行く事ができる↓
    //     return view('record', ['data' => $data]);
    // }

    // public function record(){
    // $holidays = Yasumi::create('Japan', '2018', 'ja_JP');
    // return view('record', $holidays); 
    // }
 
    

=======
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
    $working_days = working_days::where('year',$carbon_year)->where('month',$carbon_month)->get();
    $yasumi = \DB::table('yasumi')->get();
    


    if($calendar->isEmpty()){
      // TODO 早期リターンで違うVIEWに飛ばす（データが見つかりません的な、４０４みたいな）
      return view('welcome');
    }
    return view('record',compact('calendar', 'working_days', 'yasumi'));
      
  }
>>>>>>> a573a90f11b0f00842e3701402bb2ac6ec92f4e1
}