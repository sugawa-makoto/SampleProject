<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Posts;
use App\Models\Photo;
use App\Models\Onsite;
use Storage;
use DB;

class PhotoController extends Controller
{
    public function photo_list()
    {
        // dd(Photo::find(40)->onsite);
        $onsites = Onsite::all();
        return view('onsite_photo_list', ['onsites' => $onsites]);
    }


    public function photo_detail(Request $request, $id)
    {
        $image_url = Onsite::find($id)->photos()->get();
        return view('onsite_photo_detail', ['image_url' => $image_url]);
    }
}
