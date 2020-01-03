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

class WeekendController extends Controller
{
    public function weekend_cleate(){
        $carbon = Carbon::now();
        $carbon_year = $carbon->year; //今年
        $carbon_month = $carbon->month; //今月
        $carbon_day = $carbon->day;//今日
        $carbon_today = Carbon::today();//今日は何年何月何日
        $carbon_several_days = $carbon->daysInMonth;//今月の日数
    
    }
}
