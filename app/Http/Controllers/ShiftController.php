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

class ShiftController extends Controller
{
    public function shift_list(){

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
        return view('shift_list',compact('calendar', 'working_days', 'yasumi'));
    }

    public function shift_detail($id){
        return view('shift_detail');
    }

    public function shift_form_send(){
        $request->validate([
        'onsite_name' => 'required|string|max:255',  // 必須・文字列・２５５文字以内
        'weather' => 'required',               // 必須
        'temperature' => 'required|integer',          // 必須・整数
        'humidity' => 'required|integer',          // 必須・整数
        'work_title' => 'required|string|max:255',  // 必須・文字列・２５５文字以内
        // 'file' => 'required|file|image|max:10000',  // 必須・アップロードに成功している・画像ファイルである・10MB以内である
        'work_detail' => 'required',              // 必須
        'people' => 'required|integer',          // 必須・整数
        ]);


        $record = new Onsite;
        $record->onsite_name = $request->onsite_name;
        $record->weather = $request->weather;
        $record->temperature = $request->temperature;
        $record->humidity = $request->humidity;
        $record->work_title = $request->work_title;
        $record->work_detail = $request->work_detail;
        $record->people = $request->people;
        $record->save();
        
        // 二重送信対策
        $request->session()->regenerateToken();
        
        return view('shift_form', ['status' => true]);
    }
    public function shift_form_input()
    {
        return view('shift_form');
    }
}
