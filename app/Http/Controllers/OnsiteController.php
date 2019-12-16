<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\Onsite;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;


class OnsiteController extends Controller{

    public function index(){
        return view('onsite_form');
    }

    public function receiveData(Request $request){

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
        $record->user_name = Auth::user()->name;
        $record->save();
        
        // 二重送信対策
        $request->session()->regenerateToken();
        return view('onsite_form', ['status' => true]);
    }

    public function select(){
        return view('onsite_select');
    }

    public function list(){
      // Frameworksモデルのインスタンス化
      $md = new Onsite();
      // データ取得
      $data = $md->getData();
      // ビューを返す
    //   dd($data);
      return view('onsite_list', ['data' => $data]);
    }
}
