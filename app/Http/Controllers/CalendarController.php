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

class CalendarController extends Controller
{
    public function update(){
        $carbon = Carbon::now();
        $carbon_year = $carbon->year; //今年
        $carbon_month = $carbon->month; //今月
        $carbon_day = $carbon->day;//今日
        $carbon_today = Carbon::today();//今日は何年何月何日
        $carbon_several_days = $carbon->daysInMonth;//今月の日数
        $index_youbi = "日曜日";


        //カレンダーの当月分の日付の羅列を生成する↓
        $search_start_day = calendar::where('day',1)->where('month',$carbon_month)->exists();
        
        if($search_start_day)
        {
            return redirect('/kanri');
        }
        if(!$search_start_day){
            $days = [];
            for ($i=1; $i <= $carbon_several_days; $i++) {
                
                $carbon_date = Carbon::parse("$carbon_year-$carbon_month-$i");
                // 日本語ロケールをセット
                setlocale(LC_ALL, 'ja_JP.UTF-8');
                // これで「2019/01/01（火）」になります
                $dayOfWeek =  $carbon_date->formatLocalized('%m月%d日(%a)');
                
                $days[] = ['day' => $i, 'year' => $carbon_year, 'month' => $carbon_month, 'today_youbi' => $dayOfWeek, 'today' => $carbon_year.'-'.$carbon_month.'-'.$i, 'youbi' =>null];
            }
            $cli = DB::table('calendar')
            -> insert($days);
            return redirect('/kanri');
        }
    }
}

