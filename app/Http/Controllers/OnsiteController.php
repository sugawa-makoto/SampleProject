<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\Onsite;
use App\Models\Photo;
use Storage;
use DB; 
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
        $record->save();
        
        // 二重送信対策
        $request->session()->regenerateToken();

        $files = $request->file('file');
        if(!empty($files)):
            foreach($files as $file):
                // $path = Storage::disk('s3')->putFile('/', $file, 'public');
                // ファイル名を指定する
                // $path = Storage::putFileAs('photos', new File('/path/to/photo'), 'photo.jpg');
                // 企業名指定（企業毎指定）
                $company_name = 'ABC';
                // フォームで選択された現場名
                $onsite_name = $record->onsite_name;
                // onsite_id
                $onsite_id = $record->id;
                // ランダムな文字列を生成
                $access_token = str_random(32);
                //ランダム文字列png指定1
                $filename = $company_name.$onsite_name.$access_token.'.png';
                //第一引数：S3のフォルダー、第二引数：ファイルのURL、第三引数：任意のファイル名、第４引数：公開指定
                $path = Storage::disk('s3')->putFileAs('/', $file, $filename, 'public');
                $photo = Photo::create([
                    'company_name' => $company_name,
                    'image_url' => $filename,
                    'onsite_name' => $onsite_name,
                    'onsite_id' => $onsite_id,
                    ]);
            endforeach;
        endif;
        



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
    return redirect ('onsite_list', ['data' => $data]);
    }
}
