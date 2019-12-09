<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Posts;
use Storage;
use DB;
class PostsController extends Controller
{
    public function upload(Request $request)
    {
        
        $file = $request->file('file');
        // 第一引数はディレクトリの指定
        // 第二引数はファイル
        // 第三引数はpublickを指定することで、URLによるアクセスが可能となる
        $path = Storage::disk('s3')->putFile('/', $file, 'public');
        // hogeディレクトリにアップロード
        // $path = Storage::disk('s3')->putFile('/hoge', $file, 'public');
        // ファイル名を指定する場合はputFileAsを利用する
        // $path = Storage::disk('s3')->putFileAs('/', $file, 'hoge.jpg', 'public');
        // アップロードした画像のフルパスを取得
        
        
        return redirect('/onsite_form');
    }
    public function index()
    {
        $disk = Storage::disk('s3');
        $files = $disk->files('/');
        
        return view('onsite_index', ['files' => $files]);
        // $post = new Posts;
        // $posts = Posts::all();

        // $postsdata = [];//空を定義
        // foreach($posts as $post)
        // {
        //     $postsdata[] = ['image_path' => $post->image_path];
        // }
        
        // return view('onsite_index',compact('postsdata'));
    }

}
