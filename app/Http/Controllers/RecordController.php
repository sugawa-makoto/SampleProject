<?php

namespace App\Http\Controllers;
// use Illuminate\Http\Request;
// 何を使うか調べる↓
use App\Models\Working_days;
use App\Models\Yasumi;
use Illuminate\Http\Request;

class RecordController extends Controller {
    public function model()
    {
      // Frameworksモデルのインスタンス化
      $md = new Working_days();
      // データ取得
      $data = $md->getData();
  
      // ビューを返す
      return view('record', ['data' => $data]);
    }
    public function yasumi_model()
    {
      // Frameworksモデルのインスタンス化
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
}