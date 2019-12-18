<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Posts;
use App\Models\Photo;
use Storage;
use DB;

class PhotoController extends Controller
{
    public function photo_list()
    {
        $onsites = \DB::table('onsites')->get();
        
    
        return view('onsite_photo_list', ['onsites' => $onsites]);
    }


    public function photo_detail()
    {
        $disk = Storage::disk('s3');
        $files = $disk->files('/');

        return view('onsite_photo_detail', ['files' => $files]);
    }
}
