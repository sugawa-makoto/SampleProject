<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\Yasumi;
use App\Models\Working_days;
use App\Models\view_working_days;
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
        $carbon_today = Carbon::today();//今日は何年何月何日
        $carbon_several_days = $carbon->daysInMonth;//今月の日数
        $carbon_new_year = $carbon_year.'-'.'1'.'-'.'1';

        
      
            $existsWorkingDays = yasumi::where('yasumi_day',$carbon_new_year)->exists();
            
            if ($existsWorkingDays)
            {
                return redirect('/stamp');
            }
            if (!$existsWorkingDays){
                $holidays = yasumi_create::create('Japan', "$carbon_year", 'ja_JP');
                
                
                $yasumidata = [];//空を定義
                foreach($holidays as $holiday)
                {
                    $yasumidata[] = ['yasumi_name' => $holiday->getName(), 'yasumi_day' => $holiday];
                }
                
                $cli = DB::table('yasumi')
                -> insert($yasumidata);

            

            $yasumi_table = DB::table('yasumi');
            $data = $yasumi_table
            ->where('yasumi_name', 'like', '%bserved')
            ->update([
                'yasumi_name' => "振替休日"
            ]);
            return redirect('/stamp');
            }
    }
}
