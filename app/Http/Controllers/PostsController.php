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
        
        $files = $request->file('file');
        if(!empty($files)):
            foreach($files as $file):
                $path = Storage::disk('s3')->putFile('/', $file, 'public');
            endforeach;
        endif;
        
        return redirect('/onsite_form');
    }
    public function index()
    {
        $disk = Storage::disk('s3');
        $files = $disk->files('/');
        
        return view('onsite_index', ['files' => $files]);
    }

}
