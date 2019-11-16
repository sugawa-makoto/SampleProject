<?php

namespace App\Http\Controllers;
// use Illuminate\Http\Request;
// 何を使うか調べる↓
use App\Models\Working_days;
use DB; 
use Illuminate\Http\Request;
use \Yasumi\Yasumi;//〜として。。
use Carbon\Carbon;

class RecordController extends Controller {
    public function model(){
      $dt = Carbon::now();
      $dty = $dt->year; //今年
      
      
      $holidays = Yasumi::create('Japan', "$dty", 'ja_JP');
      $yasumidata = [];//空を定義
      foreach($holidays as $holiday) {
          $yasumidata[] = ['yasumi_name' => $holiday->getName(), 'yasumi_day' => $holiday];
      }
      $cli = DB::table('yasumi')
      -> insert($yasumidata);

      // Frameworksモデルのインスタンス化
      $md = new Working_days();
      // データ取得
      $data = $md->getData();
      // ビューを返す
      return view('record', ['data' => $data]);
    }
}