<?php

namespace App\Http\Controllers;

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
 
    

}