<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\Yasumi;
use App\Models\Working_days;
use App\Models\calendar;
use App\Models\days_30;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;
use \Yasumi\Yasumi as yasumi_create;
use DB;

class YasumiController extends Controller
{


    public function yasumi(){
        $carbon = Carbon::now();
        $carbon_year = $carbon->year; //今年
        $carbon_month = $carbon->month; //今月
        $carbon_day = $carbon->day;//今日
        $carbon_several_days = $carbon->daysInMonth;//今月の日数

        $search_start_day = calendar::where('day',1)->exists();
        if($search_start_day)
        {
            return view('top');
        }
        if(!$search_start_day)
        {
            $days = [];
            for ($i=1; $i <= $carbon_several_days; $i++) {
              $days[] = ['day' => $i, 'year' => $carbon_year, 'month' => $carbon_month, 'today' => $carbon_year.'-'.$carbon_month.'-'.$i];

            }
            
            $cli = DB::table('calendar')
            -> insert($days);
        }

        // if ($dt >= $startTime)
        // {
        //     $existsWorkingDays = yasumi::where('yasumi_day',$startTime)->exists();
        //     if ($existsWorkingDays)
        //     {
        //         return view('top');
        //     }
        //     if (!$existsWorkingDays){
        //         $holidays = yasumi_create::create('Japan', "$dty", 'ja_JP');
        //         $yasumidata = [];//空を定義
        //         foreach($holidays as $holiday)
        //         {
        //             $yasumidata[] = ['yasumi_name' => $holiday->getName(), 'yasumi_day' => $holiday];
        //         }
        //         $cli = DB::table('yasumi')
        //         -> insert($yasumidata);
        //     }
        // }
    }
}
