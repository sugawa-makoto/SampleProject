<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\Yasumi;
use App\Models\Working_days;
use App\Models\days_30;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;
use \Yasumi\Yasumi as yasumi_create;
use DB;

class YasumiController extends Controller
{


    public function yasumi(){
        $dt = Carbon::now();
        $dty = $dt->year; //今年
        $startTime = new Carbon("$dty-01-01");
        if ($dt >= $startTime)
        {
            $existsWorkingDays = yasumi::where('yasumi_day',$startTime)->exists();
            if ($existsWorkingDays)
            {
                return view('top');
            }
            if (!$existsWorkingDays){
                $holidays = yasumi_create::create('Japan', "$dty", 'ja_JP');
                $yasumidata = [];//空を定義
                foreach($holidays as $holiday)
                {
                    $yasumidata[] = ['yasumi_name' => $holiday->getName(), 'yasumi_day' => $holiday];
                }
                $cli = DB::table('yasumi')
                -> insert($yasumidata);
            }
        }
    }
    

    public function days_30(){
        $dt = Carbon::now();
        $now_month = $dt->month;//今月
        $dtmm = $dt->daysInMonth;//今月の日数
        
        $days_30 = days_30::where('now_month',$now_month)->exists();
        
        if($days_30)
        {
            return view('top');
        }
        if(!$days_30)
        {
            $dtmmdata = [];
            for ($i=1; $i <= $dtmm; $i++) {
              $dtmmdata[] = ['days' => $i, 'now_month' => $now_month];
            }
            
            $cli = DB::table('days_30')
            -> insert($dtmmdata);
        }
    }
}
