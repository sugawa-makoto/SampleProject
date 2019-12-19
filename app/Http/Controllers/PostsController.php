<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Posts;
use App\Models\Company;
use App\Models\Photo;
use App\Models\Onsite;
use Storage;
use DB;
class PostsController extends Controller
{
    public function upload(Request $request)
    {
        
        $files = $request->file('file');
 
        if(!empty($files)):
            foreach($files as $file):
                // $path = Storage::disk('s3')->putFile('/', $file, 'public');
                // ファイル名を指定する
                // $path = Storage::putFileAs('photos', new File('/path/to/photo'), 'photo.jpg');
                // 企業名指定（企業毎指定）
                $company_name = 'ABC';
                // フォームで選択された現場名（未構築）
                $onsite_name = '大谷邸';
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
                    ]);
            endforeach;
        endif;
        return redirect('/onsite_form')->with('flash_message', 'uploadが完了しました');
    }
}
